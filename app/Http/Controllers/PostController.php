<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use App\repository\ArticleRepo\ArticleRepo;
use App\repository\Categories\CategoryRepo;
use App\repository\posts\PostRepo;
use App\Services\Media\Images;
use App\Services\Media\Files;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function __construct(public PostRepo $postRepo, public CategoryRepo $categoryRepo,
                                public Images $images,
                                public Files  $files,)
    {
    }
    public function index()
    {
        $posts = Post::query()->paginate();
        return view('admin.posts.index' , compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $parentCategories = Category::all();
        return view('admin.posts.create' , compact('parentCategories' , 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $categoryIds = $this->categoryRepo->pluck($request->category);

        $file = $request->video ? $this->files->handleUploadFileArticle($request->file('video')) : null;

        if (!is_null($request->file('image'))) {
            $file_path = $this->images->handleUploadImageArticle($request->file('image'));
        }
        $article = $this->postRepo->create($request, $file_path, $file);
        $this->syncCategory($request, $article, $categoryIds);
        $this->syncTagsStore($request, $article);
        return redirect()->route('panel.posts.index');
    }

    public function edit($post)
    {
        $posts = $this->postRepo->getById($post);
        $tags = Tag::all();
        $parentCategories = Category::all();

        return view('admin.posts.edit' , compact('posts' , 'tags' , 'parentCategories'));
    }


    public function update(UpdatePostRequest $request, $postId)
    {
        $posts = $this->postRepo->getById($postId);

        $categoryIds = $this->categoryRepo->pluck($request->category);

        $file = $request->video ? $this->files->handleUploadFileArticle($request->file('video')) : null;
        if (!is_null($request->file('image'))) {
            $file_path = $this->images->handleUploadImageArticle($request->file('image'));
        }
        $this->postRepo->update($request, $posts, $file_path,  $file);
        $this->syncCategory($request, $posts, $categoryIds);
        $this->sync_update_tags($request, $posts);

        return redirect()->route('panel.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        if (File::exists(public_path('/images/articles/' . $post->image['900']))) {
            File::delete(public_path('/images/articles/' . $post->image['900']));
        }
        if (File::exists(public_path('/images/articles/' . $post->image['300']))) {
            File::delete(public_path('/images/articles/' . $post->image['300']));
        }
        if (File::exists(public_path('/images/articles/' . $post->image['original']))) {
            File::delete(public_path('/images/articles/' . $post->image['original']));
        }
        if (Storage::exists('files/articles/' . $post->file)) {
            Storage::delete('files/articles/' . $post->file);
        }
       $post = Post::query()->where('id' , $post)->delete();
        return redirect()->route('panel.posts.index');
    }

    public function syncTagsStore(StorePostRequest $request, $article): void
    {
        if ($request->filled('tags') && count($request->tags)) {
            $tag_ids = collect($request->tags)->map(function ($tag) use ($request) {
                return Tag::query()->firstOrCreate(['title' => $tag], ['title' => $tag, 'slug' => Str::slug($tag), 'user_id' => $request->user()->id])->id;
            })->toArray();
            $article->tags()->attach($tag_ids);
        }
    }

    public function syncCategory($request, $article, $categoryIds)
    {
        if ($request->category) {
            $article->categories()->sync($categoryIds);
        }
    }

    public function sync_update_tags(UpdatePostRequest $request, $article): void
    {
        if ($request->filled('tags') && count($request->tags)) {
            $tag_ids = collect($request->tags)->map(function ($tag) use ($request) {
                return Tag::query()->firstOrCreate(['title' => $tag], ['title' => $tag, 'slug' => Str::slug($tag), 'user_id' => $request->user()->id])->id;
            })->toArray();
            $article->tags()->sync($tag_ids);
        }
    }


    public function good($id)
    {
        if($this->postRepo->confirmation($id , Post::STATUS_GOOD))
        {
            return back();
        }
    }

    public function reject($id)
    {
        if($this->postRepo->confirmation($id , Post::STATUS_REJECT))
        {
            return back();
        }
    }

    public function confirm($id)
    {
        if($this->postRepo->confirmation($id , Post::STATUS_SUCCESS))
        {
            return back();
        }
    }

}
