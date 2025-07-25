<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];
    
    protected $casts =[
        'links' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getFeaturedImagePathAttribute()
    {
        if ($this->images()->count())
            return $this->images()->first()->thumbnail_path;

        return null;
    }

    public function images()
    {
        return $this->hasMany(PostImage::class)->oldest('order');
    }

    public function documents()
    {
        return $this->hasMany(Document::class)->oldest('order');
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collections_posts', 'collection_id', 'post_id');
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    
    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_categories_relation', 'post_id', 'post_category_id');
    }
    
    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'category_post', 'post_id', 'category_id');
    }

    public function getProcessedBodyAttribute()
    {
        
        $body = $this->body;

        // Replace all <a> tags to open in a new tab
        $body = str_replace('<a ', '<a target="_blank" ', $body);
        
       // Detect and replace Tinkercad URLs with embed code
       $body = preg_replace_callback(
           '/https:\/\/www\.tinkercad\.com\/things\/([a-zA-Z0-9]+)/',
           function ($matches) {
               $id = $matches[1];
               $iframe = '<iframe width="725" height="453" src="https://www.tinkercad.com/embed/' . $id . '?editbtn=1" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
               return $iframe;
           },
           $body
       );
        
        return $body;
    }

}