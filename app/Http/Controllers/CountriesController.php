<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Countries;
use App\Models\Folders;

class CountriesController extends Controller
{
    public function getCountries(Request $req) {
        $input = $req->get('input');
        $countries = Countries::where('Name', 'LIKE', $input.'%')->get();
        return $countries;
    }

    public function renderCountries() {
        $id = Auth::id();

        return Inertia::render('AddCountry', [
            'countries' => Countries::all(),
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }

    public function addCountries(Request $req) {
        $country = Countries::create($req->validate([
            'Name' => ['required'],
        ]));
        
        return to_route('addCountry');
    }

    public function updateCountry(Request $req) {
        $country = Countries::where('id', $req->get('id'))->first();
        $country->update(array('Name' => $req->get('Name')));
    }

    public function deleteCountry(Request $req) {
        $country = Countries::where('id', $req->get('id'))->delete();
    }
}
