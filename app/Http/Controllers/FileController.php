<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload_file()
    {
        return view('perblad.upload');
    }

    public function storeFile(Request $request)
    {

    $file = $request->file('user_photo');

    $path = $file->store('avatars','public');

    }
}
