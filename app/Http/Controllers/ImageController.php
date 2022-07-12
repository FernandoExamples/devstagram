<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $imageName = ImageService::storeImage($request->file('file'), 'posts');
        return $imageName;
    }

    public function destroy(Request $request)
    {
        ImageService::deleteImage($request->image_path);
        return "Imagen Eliminada";
    }
}
