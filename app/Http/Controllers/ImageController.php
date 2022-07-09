<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = 'img/' . Str::uuid() . '.' . $image->extension();
        $imagePath = Storage::disk('public')->path($imageName);

        $newImage = Image::make($image);
        $newImage->fit(1000, 1000);
        $newImage->save($imagePath);

        return $imageName;
    }

    public function destroy(Request $request)
    {
        Storage::disk('public')->delete($request->image_path);
        return "Imagen Eliminada";
    }
}
