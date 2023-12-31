<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Serials;
use App\Models\Genres;
use App\Models\Countries;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;

class FilterService {
    public function serialsWithParams($selectedGenres = null, $selectedCountries = null, $folderId = null) {
        $serials = Serials::query();
        if ($selectedGenres) {
            foreach ($selectedGenres as $selectedGenre) {
                $serials->whereHas('genres', function (Builder $query) use ($selectedGenre) {
                    $query->where('genres_id', $selectedGenre);
                });
            }
        };

        if ($selectedCountries) {
            foreach ($selectedCountries as $selectedCountry) {
                $serials->whereHas('countries', function (Builder $query) use ($selectedCountry) {
                    $query->where('countries_id', $selectedCountry);
                });
            }
        };

        if ($folderId) {
            $serials->whereHas('folders', function(Builder $query) use($folderId) {
                $query->where('folders_id', $folderId);
            });
        };

        return $serials->with('genres', 'countries', 'folders')
            ->leftJoinSub(
                Ratings::select('serial_id', DB::raw('AVG(rating) as avg_rating'))
                    ->groupBy('serial_id'),
                'ratings',
                'serials.id',
                '=',
                'ratings.serial_id')
            ->select('serials.*', 'ratings.avg_rating as avg_rating')
            ->get();
    }

    public function withFilters($selectedGenres = null, $selectedCountries = null, $folderId = null) {
        $serials = $this->serialsWithParams($selectedGenres, $selectedCountries, $folderId);
        $id = Auth::id();

        return [
            'serials' => $serials,
            'genres' => Genres::all(),
            'countries' => Countries::all(),
            'selectedGenres' => $selectedGenres,
            'selectedCountries' => $selectedCountries,
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
            'folder' => Folders::where('id', $folderId)->first(),
        ];
    }
}

// foreach используется для итерации по каждому жанру в $selectedGenres.
// Для каждого жанра создаётся отдельный вызов whereHas, чтобы добавить условие,
// которое проверяет наличие связи с этим жанром в связанной таблице genres.
// При каждой итерации создаётся новое замыкание function (Builder $query) use ($selectedGenre) { ... },
// которое будет выполнять фильтрацию по конкретному жанру.
// Внутри замыкания используется where('genres_id', $selectedGenre) для добавления условия,
// что genres_id должен быть равен конкретному жанру.
// По мере выполнения цикла, каждый вызов whereHas будет добавлять дополнительное условие фильтрации,
// что позволит выбрать только те сериалы, которые имеют все выбранные жанры одновременно.