<?php

namespace App\Repository\Tags;

use App\Models\Panel\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TagRepo
{
    public function all()
    {
       return Tag::all();
    }

    public function create($value)
    {
        return Tag::create([
            'title' => $value->title ,
            'slug' => SlugService::createSlug(Tag::class, 'slug', $value->title),
            'user_id' => auth()->user()->id
        ]);

    }

    public function delete($id)
    {
        return Tag::query()->where('id' , $id)->delete();
    }


    public function search($search)
    {
        return Tag::query()->where('title', 'LIKE', "%{$search->search}%") ;
    }

}
