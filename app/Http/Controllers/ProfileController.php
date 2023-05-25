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

        if ($req->photo) {
            $imageFolderPath = "uploads/";
            $base64Image = explode(";base64,", $req->photo);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $file = $imageFolderPath . uniqid() . '.' . $imageType;
            file_put_contents($file, $image_base64);
            $user->Photo = $file;
        }

        $user->Sex = $req['sex'];
        $user->DateOfBirth = $req['dateOfBirth'];
        $user->save();
    }

    public function deleteProfile() {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        $user->delete();
    }
}
