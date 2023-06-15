<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Folders;

class RegisterController extends Controller
{
    public function register() {
        $id = Auth::id();
        
        return Inertia::render('Register', [
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
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

        $folders = [
            [
                'Name' => 'Буду смотреть',
                'user_id' => $user->id
            ],
            [
                'Name' => 'Избранное',
                'user_id' => $user->id
            ],
            [
                'Name' => 'Любимые сериалы',
                'user_id' => $user->id
            ],
        ];

        Folders::insert($folders);

        Auth::loginUsingId($user->id);

        return to_route('profile');
    }
}
