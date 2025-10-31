<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with(['category', 'media'])->latest('id')->paginate(10);
        $categories = Category::all();
        return view('admin.subCategory.index', compact('subCategories', 'categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        SubCategoryRepository::storeByRequest($request);
        return to_route('subCategory.index')->withSuccess('Sub Category created successfully.');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.subCategory.edit', compact('subCategory', 'categories'));
    }

    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        SubCategoryRepository::updateByRequest($request, $subCategory);
        return to_route('subCategory.index')->withSuccess('Sub Category updated successfully.');
    }
}
