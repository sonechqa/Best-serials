<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Serials;
use App\Models\Folders;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $req) {
        $search = $req->get('search');
        $id = Auth::id();
        
        return Inertia::render('SearchResults', [
            // 'serials' => Serials::where('Name', 'LIKE', $search.'%')->with('genres', 'countries')->get(),
            'serials' => Serials::where('Name', 'LIKE', $search.'%')
                ->with('genres', 'countries')
                ->leftJoinSub(
                    Ratings::select('serial_id', DB::raw('AVG(rating) as avg_rating'))
                        ->groupBy('serial_id'),
                    'ratings',
                    'serials.id',
                    '=',
                    'ratings.serial_id')
                ->select('serials.*', 'ratings.avg_rating as avg_rating')
                ->get(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }
}