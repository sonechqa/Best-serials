<?php

namespace App\Http\Controllers;

use App\Models\Folders;
use App\Models\Serials;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class FoldersController extends Controller
{
    public function renderFolders() {
        return Inertia::render('AddFolder', [
            'folders' => Folders::all(),
            'user' => Auth::user(),
        ]);
    }

    public function addFolders(Request $req) {
        $folder = Folders::create($req->validate([
            'Name' => ['required'],
        ]));
        return to_route('addFolder');
    }

    public function updateFolder(Request $req) {
        $folder = Folders::where('id', $req->get('id'))->first();
        $folder->update(array('Name' => $req->get('Name')));
        return to_route('addFolder');
    }

    public function deleteFolder(Request $req) {
        $folder = Folders::where('id', $req->get('id'))->delete();
        return to_route('addFolder');
    }

    public function addInFolder(Request $req) {
        $folder = Folders::where('id', $req->get('folderId'))->first();
        $serial = Serials::where('id', $req->get('serialId'))->first();
        $serial->folders()->attach($folder);
    }

    public function willWatch() {
        $serials = Serials::whereHas('folders', function(Builder $query) {
            $query->where('folders_id', 1);
        })
        ->with('genres', 'countries')->get();
        return Inertia::render('WillWatch', [
            'serials' => $serials,
            'folders' => Folders::all(),
            'user' => Auth::user(),
        ]);
    }

    public function renderOneFolder(string $id) {
        $serials = Serials::whereHas('folders', function(Builder $query) use($id) {
            $query->where('folders_id', $id);
        })
        ->with('genres', 'countries')->get();
        return Inertia::render('OneFolder', [
            'serials' => $serials,
            'folder' => Folders::where('id', $id)->first(),
            'user' => Auth::user(),
        ]);
    }
}