<?php

namespace App\Repository\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use function auth;

class CategoryRepo
{
    public function paginate()
    {
       return Category::with('parent')->paginate();
    }

    public function categoryParent()
    {
        return Category::query()->where('parent_id' , null)->get();
    }

    public function store($values)
    {
        return Category::create([
            'name' =>$values->name,
            'slug' => Str::slug($values->slug),
            'parent_id' =>$values->category_id,
            'body' =>$values->body,
            'user_id' => auth()->user()->id ,
        ]);
    }

    public function delete($id)
    {
        return Category::query()->where('id' , $id)->delete();
    }

    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    public function allExceptById($id)
    {
        return Category::all()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public function update($categoryId , $values)
    {
        return Category::query()->where('id' , $categoryId)
            ->update([
                'name' =>$values->name,
                'slug' => Str::slug($values->slug),
                'parent_id' =>$values->parent_id,
                'body' =>$values->body,
                'user_id' => auth()->user()->id ,

            ]);
    }

    public static function getCategory()
    {
        return Category::query()->where('parent_id' , 0)->get();
    }

    public static function getParent($id)
    {
        return Category::query()->where('parent_id' , $id)->get();
    }

    public function all()
    {
        return Category::all();
    }

    public function pluck($category)
    {
        return Category::where('name', $category)->get()->pluck('id')->toArray() ;
    }

    public function search($request)
    {
        return Category::query()->where('name' , 'LIKE' ,  "%{$request->search}%") ;
    }

    public function updateConfirmationStatus($id, string $status)
    {
        return Category::query()->where('id', $id)->update(['confirmation_status' => $status]);
    }
}
