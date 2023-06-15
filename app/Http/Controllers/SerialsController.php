<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Serials;
use App\Models\Folders;

class SerialsController extends Controller
{
    public function serials() {
        $id = Auth::id();

        return Inertia::render('AddSerial', [
            'serials' => Serials::with('genres', 'countries')->get(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }

    public function store(Request $req)
    {
        $serial = Serials::create($req->validate([
            'Name' => ['required'],
            'Poster' => ['required'],
            'Description' => ['required'],
            'Directors' => ['required'],
            'Rating' => ['required'],
            'ReleaseYears' => ['required'],
          ]));

        $serial->genres()->attach($req->get('Genres'));
        $serial->countries()->attach($req->get('Countries'));

        return to_route('addSerial');
    }

    public function update(Request $req) {
        $serial = Serials::where('id', $req->get('id'))->first();

        if ($req->Poster) {
            $imageFolderPath = "images/";
            $base64Image = explode(";base64,", $req->Poster);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $file = $imageFolderPath . uniqid() . '.' . $imageType;
            file_put_contents($file, $image_base64);
            $serial->Poster = $file;
        }

        $serial->update(
            array('Name' => $req->get('Name'),
            'Description' => $req->get('Description'),
            'Directors' => $req->get('Directors'),
            'Rating' => $req->get('Rating'),
            'ReleaseYears' => $req->get('ReleaseYears'),
        ));

        $serial->genres()->sync($req->get('Genres'));
        $serial->countries()->sync($req->get('Countries'));
    }

    public function deleteSerial(Request $req) {
        $serial = Serials::where('id', $req->get('id'))->delete();
    }

    public function showSerialPage(string $id) {
        $userId = Auth::id();

        return Inertia::render('OneSerial', [
            'serial' => Serials::where('id', $id)->with('genres', 'countries')->first(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $userId)->get(),
        ]);
    }

    public function getSerial(Request $req) {
        $input = $req->get('input');
        $serials = Serials::where('Name', 'LIKE', $input.'%')->get();
        
        return $serials;
    }
}
