<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'comment_id',
        'user_id',
        'article_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Articles::class);
    }

    public function children()
    {
        return $this->hasMany(Comment::class);
    }

    public function childComments()
{
    return $this->hasMany(Comment::class, 'comment_id')->with('childComments');
}

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s d-m-Y');
    }
}
