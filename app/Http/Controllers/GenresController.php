<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;

class GenresController extends Controller
{
    public function getGenres(Request $req) {
        $input = $req->get('input');
        $genres = Genres::where('Name', 'LIKE', $input.'%')->get();
        return $genres;
    }

    public function renderGenres() {
        return Inertia::render('AddGenre', [
            'genres' => Genres::all(),
            'user' => Auth::user(),
            'folders' => Folders::all(),
        ]);
    }

    public function addGenres(Request $req) {
        $genre = Genres::create($req->validate([
            'Name' => ['required'],
        ]));
        return to_route('addGenre');
    }

    public function updateGenre(Request $req) {
        $genre = Genres::where('id', $req->get('id'))->first();
        $genre->update(array('Name' => $req->get('Name')));
    }

    public function deleteGenre(Request $req) {
        $genre = Genres::where('id', $req->get('id'))->delete();
    }
}
