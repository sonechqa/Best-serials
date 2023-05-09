<?php

namespace App\Http\Controllers;

use App\Models\Serials;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SerialsController extends Controller
{
    public function serials() {
        return Inertia::render('AddSerial', [
            'serials' => Serials::with('genres', 'countries')->get(),
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
        $serial->update(
            array('Name' => $req->get('Name'),
            'Poster' => $req->get('Poster'),
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
}