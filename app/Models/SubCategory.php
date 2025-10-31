<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    protected $guarded = ['id'];

    // Relation to Media
    public function media()
    {
        return $this->belongsTo(\App\Models\Media::class, 'media_id');
    }

    // Easy accessor for thumbnail
    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->media && Storage::disk('public')->exists($this->media->src)
                ? asset('storage/'.$this->media->src)
                : asset('default.webp')
        );
    }

    // Relation to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Auto-generate slug if empty
    protected static function boot()
    {
        parent::boot();

        static::creating(function($subCategory){
            if (empty($subCategory->slug)) {
                $baseSlug = Str::slug($subCategory->name);
                $slug = $baseSlug;
                $count = 1;
                while(SubCategory::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $subCategory->slug = $slug;
            } else {
                $subCategory->slug = Str::slug($subCategory->slug);
            }
        });
    }
}
