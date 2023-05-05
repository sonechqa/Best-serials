<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CountriesController extends Controller
{
    public function getCountries(Request $req) {
        $input = $req->get('input');
        $countries = Countries::where('Name', 'LIKE', $input.'%')->get();
        return $countries;
    }
}
