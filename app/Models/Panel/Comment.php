<?php

namespace App\Models\Panel;

use App\Http\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory ;

    protected $fillable = [
        'user_id',
        'comment_id',
        'commentable_id',
        'commentable_type',
        'body',
        'status' ];
    const STATUS_NEW = 'new';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECT = 'reject';

    static $status = [self::STATUS_REJECT , self::STATUS_APPROVED , self::STATUS_NEW ];

    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notApprovedComments()
    {
        return $this->hasMany(Comment::class)->where("status", self::STATUS_NEW);
    }

    public function getStatusCssClass()
    {
        if ($this->status == self::STATUS_APPROVED) return "text-success";
        elseif ($this->status == self::STATUS_REJECT) return "text-error";

        return "text-warning";
    }
}
