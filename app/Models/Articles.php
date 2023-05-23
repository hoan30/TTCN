<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articles extends Model
{
    use HasFactory, SoftDeletes, Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'content',
        'view',
        'status',
        'category_id',
        'user_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'articles_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'article_id',);
    }

    public function parentComments()
    {
        return $this->hasMany(Comment::class,'article_id',)->where('comment_id', 0)->latest();
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
