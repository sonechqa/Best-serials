<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GenresController extends Controller
{
    public function getGenres(Request $req) {
        $input = $req->get('input');
        $genres = Genres::where('Name', 'LIKE', $input.'%')->get();
        return $genres;
    }
}
