<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Ratings;
use App\Models\Serials;
use App\Models\User;

class RatingsController extends Controller
{
    public function rateSerial(Request $req) {
        $rating = Ratings::create($req->validate([
            'rating' => ['required'],
        ]));

        $userId = Auth::id();
        $serialId = $req->get('serialId');

        $rating->user()->associate($userId)->save();
        $rating->serial()->associate($serialId)->save();
    }
}
