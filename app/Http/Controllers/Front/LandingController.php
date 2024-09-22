<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Panel\Comment;
use App\repository\Categories\CategoryRepo;
use App\repository\posts\PostRepo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        $categories = (new CategoryRepo())->categoryParent();
        $posts_head = (new PostRepo())->getFindlanding();
        return view('front.landing.landing' , compact('categories' , 'posts_head'));
    }

    public function category($slug)
    {
        $categories = (new CategoryRepo())->getSlugLanding($slug);
        $posts = $categories->posts;
        return view('front.category.landing' ,
            compact('posts' , 'categories'));
    }


    public function singlePost($slug)
    {
        $articleId = $this->extractId($slug, 'c');
        $articlesRepo = (new PostRepo())->getSlugSuccess($slug);
        $articlesRepo->load(['user', 'categories', 'comments' => function ($query) {
            return $query->where('comment_id', null)->where('status', Comment::STATUS_APPROVED);
        }])->loadCount('comments');
        Cache::add('__Articles__Single__Page__route__' . $articlesRepo->title, $articlesRepo,
            now()->addMinutes(300));
        return view('front.single.landing', compact('articlesRepo'));
    }

    public function extractId($slug, $key)
    {
        return Str::before(Str::after($slug, $key . '-'), '-');
    }

}
