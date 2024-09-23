<?php

namespace App\repository\posts;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostRepo
{

    public function create($value ,  array $file_path, ?string $file)
    {
        return  Post::query()->create([
            'title' => $value->title,
            'slug' =>  SlugService::createSlug(Post::class, 'slug', $value->title) ,
            'image' => $file_path,
            'video' => $file,
            'content' => $value->content,
            'body' => $value->body,
            'confirmation_post' => $value->confirmation_post,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function confirmation($id, string $STATUS_GOOD)
    {
        return Post::query()->where('id' , $id)->update(['status' => $STATUS_GOOD] );
    }

    public function getById($id)
    {
        return Post::query()->findOrFail($id);
    }

    public function update( $request,  Post $id,  $file_path , $file): int
    {
        return $id->update([
//            'title' => $request->title,
//            'slug' =>  SlugService::createSlug(Post::class, 'slug', $request->title) ,
            'image' => $file_path,
            'video' => $file,
            'content' => $request->content,
            'body' => $request->body,
            'confirmation_post' => $request->confirmation_post,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function getFindlanding()
    {
        return Post::query()->where('status' , Post::STATUS_SUCCESS)
            ->where('confirmation_post' , Post::CONFIRMATION_HEAD)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function getSlugSuccess($slug)
    {
        return Post::query()
            ->where('slug' , $slug)
            ->first();
    }

    public function rondomItem()
    {
        return Post::query()->
        where('confirmation_post' , 'head')
        ->inRandomOrder()->limit(3)->get();
    }

    public function rondomLanding()
    {
        return Post::query()->
        where('status' , Post::STATUS_SUCCESS)
            ->withCount('comments')
            ->inRandomOrder()->paginate(30);
    }
}
