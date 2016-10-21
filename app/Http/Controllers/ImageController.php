<?php

namespace App\Http\Controllers;

use \File;
use \Response;

class ImageController extends Controller
{

    public function travelImage($name)
    {
        $save_path = public_path().'/travelImage/';
        $name = $save_path . $name;

        $file = File::get($name);
        $type = File::mimeType($name);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function thumbnailImage($name)
    {
        $save_path = public_path().'/thumbnailImage/';
        $name = $save_path . $name;

        $file = File::get($name);
        $type = File::mimeType($name);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

}