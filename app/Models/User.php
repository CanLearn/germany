<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;use HasFactory;
use App\Models\Panel\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'code_phone_verify',
        'position_site',
        'address',
        'code_post',
        'image',
        'website',
        'linkedin',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'telegram',
        'ip',
        'cart_number',
        'shaba_cart',
        'email_on_follow',
        'email_on_like',
        'email_on_reply',
        'bio',
        'status',
        'last_seen' ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_BAN = 'ban';

    public static $statuses = [self::STATUS_ACTIVE , self::STATUS_INACTIVE , self::STATUS_BAN];

    public function likes()
    {
        return $this->belongsToMany(Post::class , 'like_article');
    }
    public function bookmarks()
    {
        return $this->belongsToMany(Post::class , 'mark_article');
    }


    public  function getAvatarDefault()
    {
        return asset('images/avatar.jpg');
    }
    public function getProfileUrl()
    {
        if ($this->image)
        {
            return asset('images/profile/'  . $this->image) ;
        }
        return $this->getAvatarDefault();
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
