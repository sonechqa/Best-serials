<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Serials;
use App\Models\Genres;
use App\Models\Countries;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;

class FilterService {
    public function serialsWithParams($selectedGenres = null, $selectedCountries = null, $folderId = null) {
        $serials = Serials::query();
        if ($selectedGenres) {
            $serials->whereHas('genres', function(Builder $query) use($selectedGenres) {
                $query->where('genres_id', $selectedGenres);
            });
        };

        if ($selectedCountries) {
            $serials->whereHas('countries', function(Builder $q) use($selectedCountries){
                $q->where('countries_id', $selectedCountries);
            });
        };

        if ($folderId) {
            $serials->whereHas('folders', function(Builder $query) use($folderId) {
                $query->where('folders_id', $folderId);
            });
        };

        return $serials->with('genres', 'countries', 'folders')->get();
    }

    public function withFilters($selectedGenres = null, $selectedCountries = null, $folderId = null) {
        $serials = $this->serialsWithParams($selectedGenres, $selectedCountries, $folderId);
        return [
            'serials' => $serials,
            'genres' => Genres::all(),
            'countries' => Countries::all(),
            'selectedGenres' => $selectedGenres,
            'selectedCountries' => $selectedCountries,
            'user' => Auth::user(),
            'folders' => Folders::all(),
            'folder' => Folders::where('id', $folderId)->first(),
        ];
    }
}