<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Serials;

class SearchController extends Controller
{
    public function search(Request $req) {
        $search = $req->get('search');
        return Inertia::render('SearchResults', [
            'serials' => Serials::where('Name', 'LIKE', $search.'%')->with('genres', 'countries')->get(),
        ]);
    }
}