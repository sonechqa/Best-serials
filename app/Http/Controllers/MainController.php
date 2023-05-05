<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class MainController extends Controller
{
    public function home() {
        return Inertia::render('Home', []);
    }

    public function profile() {
        $user = new User();
        $user->name = 'Sonya';
        $user->email = 'test@email.com';

        return Inertia::render('Profile', [
            'currentPage' => 'profile',
            'user' => $user,
        ]);
    }
}
