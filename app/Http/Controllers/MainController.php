<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Serials;
use App\Models\Genres;

class MainController extends Controller
{
    public function home(Request $req) {
        $checkedGenres = $req->get('checkedGenres');
        if (!$checkedGenres) {
            return Inertia::render('Home', [
                'serials' => Serials::with('genres', 'countries')->get(),
                'genres' => Genres::all(),
            ]);
        }
        $serials = Serials::whereHas('genres', function(Builder $query) use($checkedGenres){
            $query->where('genres_id', $checkedGenres);
        })->with('genres', 'countries')->get();
        return Inertia::render('Home', ['serials' => $serials, 'genres' => Genres::all()]);
    }

    public function profile() {
        $user = new User();
        $user->name = 'Sonya';
        $user->email = 'test@email.com';

        return Inertia::render('Profile', [
            'currentPage' => 'profile',
            'user' => $user,
        ]);
    }
}
