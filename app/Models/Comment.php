<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content', 'article_id','nickname', 'email','on_line'];

    public function article()
    {
        return $this->hasOne('App\Models\Article', 'id', 'article_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y年m月d日 H:i', strtotime($value));
    }
}
