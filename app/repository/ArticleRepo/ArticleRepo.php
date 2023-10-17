<?php

namespace App\Repository\ArticleRepo;
use App\Models\Panel\Article;
use App\Repository\Membership\MembershipRepo;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use Image;

class ArticleRepo
{

    public function paginate()
    {
        return Article::paginate(15);
    }

    public function create($values , $count ,  $file_path ,  $file , $membership = null)
    {
            $membership = $membership && count($membership) ? $membership[0] : null;
            return Article::create( [
                'title' => $values->title,
                'slug' => SlugService::createSlug(Article::class,
                    'slug', $values->title),
                'image' => $file_path,
                'file' => $file,
                'content' => $values->content,
                'min_read' => $count ,
                'score' => $values->score ,
                'type' => $values->type,
                'summary' => $values->summary,
                'membership_id' => $membership,
                'confirmation_status' => Article::CONFIRMATION_STATUS_PENDING,
                'user_id' => auth()->id(),
            ]);
    }

    public function delete($articleId)
    {
        return Article::query()->where('id' , $articleId)->delete();
    }
    public function findById($id)
    {
        return Article::findOrFail($id);
    }

    public function update($request , $id ,  $file_path ,$membership  , $count , $file)
    {
        $membership = $membership[0];
        return Article::query()->where('id' , $id)->update([
            'title' => $request->title,
            'slug' => SlugService::createSlug(Article::class,
                'slug', $request->title),
            'image' => $file_path,
            'file' => $file,
            'content' => $request->content,
            'min_read' => $count ,
            'score' => $request->score ,
            'summary' => $request->summary,
            'membership_id' => $membership,
            'confirmation_status' => Article::CONFIRMATION_STATUS_PENDING,
            'user_id' => auth()->id(),
        ]);
    }

    public function getFile_path_image_update($request , $article)
    {

            if (File::exists(public_path('/images/articles/' . $article->image))) {
                File::delete(public_path('/images/articles/' . $article->image));
            }
//        return $file_path;
    }

    public function search( $request)
    {
        return Article::query()->where('title', 'LIKE', "%{$request->search}%") ;
    }

    public function updateConfirmationStatus($id, string $status)
    {
        return Article::query()->where('id', $id)->update(['confirmation_status' => $status]);
    }

    public function withUserArticle()
    {
        return Article::query()->where('user_id' , auth()->user()->id)->with('user')->paginate();
    }

    public function orderBy()
    {
        return Article::query()->orderByDesc('created_at')->paginate(8);

    }
    public function view_count()
    {
        return Article::query()->where('viewCount' ,  '>'  , 20)->orderByDesc('viewCount')->paginate();
    }

    public function likes()
    {
        return  Article::has('likes', '>=', 100)->paginate(8);
    }

    public function bookmark()
    {
        return  Article::has('bookmarks', '>=', 1)->paginate(8);

    }
}
