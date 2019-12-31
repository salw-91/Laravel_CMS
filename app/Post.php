<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= ['title', 'content', 'category_id', 'from', 'to'];

    public function fromuser()
    {
        return $this->belongsTo(User::class, 'from');
    }
    public function touser()
    {
        return $this->belongsTo(User::class, 'to');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag');
    }
}
