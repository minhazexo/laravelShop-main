<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    /**
     * Create 30x30 and 80x80 placeholder images.
     *
     * @return string
     */
    public function createScreenshots()
    {
        // Target folder
        $folder = public_path('admin/assets/images/screenshots');

        // Create folder if it doesn't exist
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        // Create 30x30 image
        Image::canvas(30, 30, '#ffffff')->save($folder . '/30x30.jpg');

        // Create 80x80 image
        Image::canvas(80, 80, '#ffffff')->save($folder . '/80x80.jpg');

        return "30x30 and 80x80 images created successfully in screenshots folder!";
    }
}
