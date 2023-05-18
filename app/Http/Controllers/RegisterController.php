<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class RegisterController extends Controller
{
    public function register() {
        return Inertia::render('Register', []);
    }

    public function addUser(Request $req) {
        $user = User::create($req->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]));
        return to_route('home');
    }
}
