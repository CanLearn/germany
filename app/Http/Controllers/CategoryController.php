<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Psy\Util\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));
    }


    public function create()
    {
        $parentCategories = Category::where('category_id', null)->get();
        return view('admin.categories.create' , compact('parentCategories'));
    }


    public function store(StoreCategoryRequest $request)
    {
        $category = Category::query()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->name) ,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('panel.category.index');
    }

    public function edit($categoriesId)
    {
        $categoriesId = Category::query()->findOrFail($categoriesId);
        $parentCategories = Category::where('category_id', null)->get();
        return view('admin.categories.edit' , compact('parentCategories' , 'categoriesId'));
    }

    public function update(UpdateCategoryRequest $request, $category)
    {
        $category = Category::query()->where('id' , $category)->update([
            'name' => $request->name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->name) ,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('panel.category.index');
    }

    public function destroy( $categoryId)
    {
        $category = Category::query()->where('id' , $categoryId)->delete();
        return redirect()->route('panel.category.index');
    }
}
