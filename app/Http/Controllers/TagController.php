<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\Category;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function index(Request $request)
    {
//        $this->authorize('manage' , Tag::class);
        $tags = Tag::all();
        return view('admin.tags.index' , compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $tags = Tag::query()->create([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Tag::class, 'slug', $request->title) ,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('panel.tags.index');
    }

    public function destroy($tag)
    {
        $delete = Tag::query()->where('id' , $tag)->delete();
        return redirect()->route('panel.tags.index');
    }
}
