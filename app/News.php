<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'body'
    ];
    
    public function comments()
    {
        return $this->hasMany('App\Comment', 'news_id_fk', 'id');
    }
}
