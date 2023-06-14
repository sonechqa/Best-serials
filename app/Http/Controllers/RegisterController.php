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

        // $folders = Folders::insert(['Name' => 'Буду смотреть'], ['Name' => 'Избранное'], ['Name' => 'Любимые сериалы']);
        $folderOne = Folders::create(['Name' => 'Буду смотреть', 'user_id' => $user->id]);
        $folderTwo = Folders::create(['Name' => 'Избранное', 'user_id' => $user->id]);
        $folderThree = Folders::create(['Name' => 'Любимые сериалы', 'user_id' => $user->id]);

        Auth::loginUsingId($user->id);

        return to_route('profile');
    }
}
