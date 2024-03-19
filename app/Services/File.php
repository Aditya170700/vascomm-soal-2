<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class File
{
    public static function upload($path, $file)
    {
        $fileName = Storage::disk('public')->put($path, $file);

        return "storage/{$fileName}";
    }

    public static function show($path)
    {
        return asset($path);
    }
}
