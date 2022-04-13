<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;

class ImageController extends Controller
{
    public function getImage($filename) {

        $path = public_path().'images/'.$filename;
        return return response()->json("Hi");
        return return response()->download($path);

    }
}
