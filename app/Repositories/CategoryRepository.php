<?php

namespace App\Repositories;

use App\Models\Category;
use Arafat\LaravelRepository\Repository;
use Illuminate\Support\Facades\Storage;

class CategoryRepository extends Repository
{
    /**
     * Base model method
     */
    public static function model()
    {
        return Category::class;
    }

    /**
     * Store category using request
     */
    public static function storeByRequest($request): Category
    {
        $thumbnail = null;

        if ($request->hasFile('image')) {
            $thumbnail = MediaRepository::storeByRequest($request->file('image'), 'categories');
        }

        return self::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'media_id' => $thumbnail?->id ?? null,
        ]);
    }

    /**
     * Update category using request
     */
    public static function updateByRequest($request, Category $category): Category
    {
        $media = $category->media;

        if ($request->hasFile('image')) {
            // If existing media exists, update it
            if ($category->media && Storage::disk('public')->exists($category->media->src)) {
                $media = MediaRepository::updateByRequest($request->file('image'), 'categories', null, $category->media);
            } else {
                $media = MediaRepository::storeByRequest($request->file('image'), 'categories');
            }
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'media_id' => $media?->id ?? null,
        ]);

        return $category;
    }
}
