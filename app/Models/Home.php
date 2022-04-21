<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Home {
    public static function all() {
        $files = File::files(resource_path("/"));

        return array_map(fn($file) => $file->getContents(),  $files);
    }
}