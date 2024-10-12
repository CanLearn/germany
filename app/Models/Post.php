<?php

namespace App\Models;

use App\Http\Traits\HasComments;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable , HasComments;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'video',
        'content',
        'body',
        'confirmation_post',
        'status',
        'col',
        'user_id'
        ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    const STATUS_PENDING = 'peding';
    const STATUS_SUCCESS = 'success';
    const STATUS_GOOD = 'good';

    const STATUS_REJECT= 'reject';

    static $status = [self::STATUS_SUCCESS , self::STATUS_GOOD , self::STATUS_PENDING , self::STATUS_REJECT];

    const CONFIRMATION_HEAD= 'head';
    const CONFIRMATION_BODY = 'body';

    static $confirmation = [self::CONFIRMATION_HEAD , self::CONFIRMATION_BODY];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class , 'category_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImagethree()
    {
        return asset('images/articles/' . $this->image['300']);
    }

    public function getImagetNine()
    {
        return asset('images/articles/' . $this->image['900']);
    }

    public function getImagetOrginal()
    {
        return asset('images/articles/' . $this->image['original']);
    }

    public function getVideo()
    {
        return asset('files/articles/video/' . $this->video);
    }



    public function path()
    {
        return route('landing.single.post',  $this->slug);
    }


    public function getImageUrl(){
        return asset('images/articles/'. $this->image);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}
