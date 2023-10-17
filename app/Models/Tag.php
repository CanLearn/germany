<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory , Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'title',
        'slug',
        'user_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class , 'article_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
