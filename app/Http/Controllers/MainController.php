<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Serials;
use App\Models\Genres;
use App\Models\Countries;

class MainController extends Controller
{
    public function home(Request $req) {
        $selectedGenres = $req->get('checkedGenres');
        $selectedCountries = $req->get('checkedCountries');
        if (!$selectedGenres && !$selectedCountries) {
            return Inertia::render('Home', [
                'serials' => Serials::with('genres', 'countries')->get(),
                'genres' => Genres::all(),
                'countries' => Countries::all(),
            ]);
        } elseif ($selectedGenres && $selectedCountries) {
            $serials = Serials::whereHas('genres', function(Builder $query) use($selectedGenres){
                $query->where('genres_id', $selectedGenres);
            })
            ->whereHas('countries', function(Builder $q) use($selectedCountries){
                $q->where('countries_id', $selectedCountries);
            })
            ->with('genres', 'countries')->get();
            return Inertia::render('Home', [
                'serials' => $serials,
                'genres' => Genres::all(),
                'countries' => Countries::all(),
                'selectedGenres' => $selectedGenres,
                'selectedCountries' => $selectedCountries
            ]);
        } else {
            $serials = Serials::whereHas('genres', function(Builder $query) use($selectedGenres){
                $query->where('genres_id', $selectedGenres);
            })
            ->orWhereHas('countries', function(Builder $q) use($selectedCountries){
                $q->where('countries_id', $selectedCountries);
            })
            ->with('genres', 'countries')->get();
            return Inertia::render('Home', [
                'serials' => $serials,
                'genres' => Genres::all(),
                'countries' => Countries::all(),
                'selectedGenres' => $selectedGenres,
                'selectedCountries' => $selectedCountries
            ]);
        }
    }
}
