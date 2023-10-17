<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'name',
        'slug',
        'category_id',
        'user_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class , 'category_post');
    }

    public function getParentName()
    {
        return is_null($this->parent) ? 'not' : $this->parent->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
