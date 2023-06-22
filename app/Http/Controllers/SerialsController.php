<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Serials;
use App\Models\Folders;
use App\Models\Ratings;
use Illuminate\Support\Facades\DB;

class SerialsController extends Controller
{
    public function serials() {
        $id = Auth::id();

        return Inertia::render('AddSerial', [
            'serials' => Serials::with('genres', 'countries')
                ->leftJoinSub(
                    Ratings::select('serial_id', DB::raw('AVG(rating) as avg_rating'))
                        ->groupBy('serial_id'),
                    'ratings',
                    'serials.id',
                    '=',
                    'ratings.serial_id')
                ->select('serials.*', 'ratings.avg_rating as avg_rating')
                ->get(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }

    public function store(Request $req)
    {
        $serial = Serials::create($req->validate([
            'Name' => ['required'],
            'Description' => ['required'],
            'Directors' => ['required'],
            'ReleaseYears' => ['required'],
          ]));

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

        $serial->save();

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
        $avgRating = Ratings::where('serial_id', $id)->avg('rating');

        return Inertia::render('OneSerial', [
            'serial' => Serials::where('id', $id)->with('genres', 'countries')->first(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $userId)->get(),
            'avgRating' => $avgRating,
            'userRating' => Ratings::where('user_id', $userId)->where('serial_id', $id)->first(),
        ]);
    }

    public function getSerial(Request $req) {
        $input = $req->get('input');
        $serials = Serials::where('Name', 'LIKE', $input.'%')->get();
        
        return $serials;
    }
}
