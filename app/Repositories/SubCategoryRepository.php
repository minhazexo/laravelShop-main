<?php

namespace App\Repositories;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryRepository
{
    public static function storeByRequest(Request $request): SubCategory
    {
        $thumbnail = null;

        if ($request->hasFile('image')) {
            $thumbnail = MediaRepository::storeByRequest($request->file('image'), 'sub-category');
        }

        return SubCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'media_id' => $thumbnail?->id ?? null,
        ]);
    }

    public static function updateByRequest(Request $request, SubCategory $subCategory): SubCategory
    {
        $media = $subCategory->media;

        if ($request->hasFile('image')) {
            if ($media && Storage::exists($media->src)) {
                $media = MediaRepository::updateByRequest($request->file('image'), 'sub-category', null, $media);
            } else {
                $media = MediaRepository::storeByRequest($request->file('image'), 'sub-category');
            }
        }

        $subCategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'media_id' => $media?->id ?? null,
        ]);

        return $subCategory;
    }
}
