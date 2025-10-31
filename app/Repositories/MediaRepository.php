<?php

namespace App\Repositories;

use App\Models\Media;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository extends Repository
{
    /**
     * Base model method
     */
    public static function model()
    {
        return Media::class;
    }

    /**
     * Store media file in database and public storage
     */
    public static function storeByRequest(UploadedFile $file, string $folder, ?string $type = null): Media
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs($folder, $fileName, 'public');

        if (!$type) {
            $extension = strtolower($file->getClientOriginalExtension());
            $type = in_array($extension, ['jpeg','jpg','png','gif','svg','webp']) ? 'image' : $extension;
        }

        return self::create([
            'type' => $type,
            'src' => $path,
            'name' => $file->getClientOriginalName(),
            'extension' => $file->getClientOriginalExtension(),
        ]);
    }

    /**
     * Update media file in database and public storage
     */
    public static function updateByRequest(UploadedFile $file, string $folder, ?string $type = null, Media $media): Media
    {
        // Delete old file
        if (Storage::disk('public')->exists($media->src)) {
            Storage::disk('public')->delete($media->src);
        }

        // Store new file
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs($folder, $fileName, 'public');

        if (!$type) {
            $extension = strtolower($file->getClientOriginalExtension());
            $type = in_array($extension, ['jpeg','jpg','png','gif','svg','webp']) ? 'image' : $extension;
        }

        $media->update([
            'type' => $type,
            'src' => $path,
            'name' => $file->getClientOriginalName(),
            'extension' => $file->getClientOriginalExtension(),
        ]);

        return $media;
    }
}
