<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFolderRequest;

class FileController extends Controller
{
    public function myFiles()
    {
        return Inertia::render('MyFiles');
    }

    public function createFolder(StoreFolderRequest $request)
    {
        $data = $request->validate();
        $parent = $request->parent;

        if (!$parent) {
            $parent = $this->getRoot();
        }

        $file = new File();
        $file->is_folder = 1;
        $file->name = $data['name'];

        $parent->appendNode($file);
    }

    public function getRoot()
    {
        return File::query()->whereIsRoot()->where('create_by', Auth::id())->firstOrfail();
    }
}
