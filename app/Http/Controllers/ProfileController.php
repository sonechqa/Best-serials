<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return Inertia::render('Profile', []);
    }

    public function updateProfile(Request $req) {
        $user = Auth::user();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->Photo = $req['photo'];
        $user->sex = $req['sex'];
        $user->DateOfBirth = $req['dateOfBirth'];
        $user->save();
    }

    public function deleteProfile() {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        $user->delete();
    }
}