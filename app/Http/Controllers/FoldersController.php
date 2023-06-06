<?php

namespace App\Http\Controllers;

use App\Models\Folders;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
}