<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LogInController extends Controller
{
    public function renderLogIn() {
        return Inertia::render('LogIn', []);
    }

    public function logInUser(Request $req) {
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($req->only('email', 'password'))) {
            return response()->json(Auth::user(), 200);
        } 
        throw ValidationException::withMessages([
            'email' => ['Неверный логин.']
        ]);
    }
}
