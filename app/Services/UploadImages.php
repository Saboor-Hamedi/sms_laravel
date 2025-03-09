<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadImages
{
    public function uploadImage(?UploadedFile $image, string $directory = 'postImages')
    {
        if (! $image) {
            return null;
        }

        return $image->store($directory, 'public');
    }
}
