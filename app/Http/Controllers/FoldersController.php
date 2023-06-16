<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Services\FilterService;
use App\Models\Folders;
use App\Models\Serials;
use App\Models\User;

class FoldersController extends Controller
{
    protected $filterService;

    public function __construct(FilterService $filterService) {
        $this->filterService = $filterService;
    }

    public function renderFolders() {
        $id = Auth::id();

        return Inertia::render('AddFolder', [
            'folders' => Folders::where('user_id', $id)->get(),
            'user' => Auth::user(),
        ]);
    }

    public function addFolders(Request $req) {
        $users = User::all();

        foreach ($users as $user) {
            $folder = $user->folders()->create($req->validate([
                'Name' => ['required'],
            ]));
        }

        return to_route('addFolder');
    }

    public function updateFolder(Request $req) {
        $folders = Folders::where('Name', $req->get('oldName'))->get();
        
        foreach ($folders as $folder) {
            $folder->Name = $req->get('newName');
            $folder->save();
        }

        return to_route('addFolder');
    }

    public function deleteFolder(Request $req) {
        $folder = Folders::where('Name', $req->get('Name'))->delete();

        return to_route('addFolder');
    }

    public function addInFolder(Request $req) {
        $folder = Folders::where('id', $req->get('folderId'))->first();
        $serial = Serials::where('id', $req->get('serialId'))->first();
        $serial->folders()->attach($folder);
    }

    public function renderOneFolder(string $id, Request $req) {
        $selectedGenres = $req->get('checkedGenres');
        $selectedCountries = $req->get('checkedCountries');
        
        return Inertia::render('OneFolder', $this->filterService->withFilters($selectedGenres, $selectedCountries, $id));
    }
}