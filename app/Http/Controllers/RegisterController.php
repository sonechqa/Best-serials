<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;

class RegisterController extends Controller
{
    public function register() {
        return Inertia::render('Register', [
            'user' => Auth::user(),
            'folders' => Folders::all(),
        ]);
    }

    public function addUser(Request $req) {
        $req->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
    }
}
