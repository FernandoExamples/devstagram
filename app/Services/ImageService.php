<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public static function storeImage(UploadedFile $image, string $directory, $width = 1000, $height = 1000)
    {
        $relativePath = ImageService::createPublicImgFolder($directory);

        $relativeImagePath = $relativePath . '/' . Str::uuid() . '.' . $image->extension();
        $imagePath = Storage::disk('public')->path($relativeImagePath);

        $newImage = Image::make($image);
        $newImage->fit($width, $height);
        $newImage->save($imagePath);

        return $relativeImagePath;
    }

    private static function createPublicImgFolder(string $directory)
    {
        $relativePath = 'img/' . $directory;
        $path = Storage::disk('public')->path($relativePath);
        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        return $relativePath;
    }

    public static function deleteImage(string $imagePath)
    {
        $path = Storage::disk('public')->path($imagePath);
        if (File::exists($path))
            File::delete($path);
    }
}
