<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function uploadImage($path, $image)
    {
        $image = Storage::disk('public')->put($path, $image);
        return $image;
    }
}
