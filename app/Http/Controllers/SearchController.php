<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Serials;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;

class SearchController extends Controller
{
    public function search(Request $req) {
        $search = $req->get('search');
        $id = Auth::id();
        return Inertia::render('SearchResults', [
            'serials' => Serials::where('Name', 'LIKE', $search.'%')->with('genres', 'countries')->get(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }
}