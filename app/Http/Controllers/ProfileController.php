<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile() {
        return Inertia::render('Profile', []);
    }
}
