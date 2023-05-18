<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LogInController extends Controller
{
    public function logIn() {
        return Inertia::render('LogIn', []);
    }
}
