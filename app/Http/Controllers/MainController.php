<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\FilterService;

class MainController extends Controller
{
    protected $filterService;

    public function __construct(FilterService $filterService) {
        $this->filterService = $filterService;
    }

    public function home(Request $req) {
        $selectedGenres = $req->get('checkedGenres');
        $selectedCountries = $req->get('checkedCountries');
        
        return Inertia::render('Home', $this->filterService->withFilters($selectedGenres, $selectedCountries));
    }
}
