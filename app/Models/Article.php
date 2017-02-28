<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $fillable = [
        'content',
        'article_type',
        'title',
        'author',
        'user_id',
        'is_recommend',
        'markdown_source',
        'is_markdown',
        'on_line',
        'type',
        'views_count',
        'comment_count',
        'sort'
    ];


    /**
     *
     */
    const ARTICLE_IS_RECOMMEND_YES = 1;

    /**
     *
     */
    const ARTICLE_IS_RECOMMEND_NO = 0;

    public static $ARTICLE_IS_RECOMMEND = [
        self::ARTICLE_IS_RECOMMEND_YES     => '是',
        self::ARTICLE_IS_RECOMMEND_NO      => '否',
    ];

    /**
     *
     */
    const ARTICLE_IS_MARKDOWN_NO = 0;
    /**
     *
     */
    const ARTICLE_IS_MARKDOWN_YES = 1;

    public static $ARTICLE_IS_MARKDOWN = [
        self::ARTICLE_IS_MARKDOWN_YES     => '是',
        self::ARTICLE_IS_MARKDOWN_NO      => '否',
    ];

    const ARTICLE_IS_ONLINE_NO = 1;
    const ARTICLE_IS_ONLINE_YES = 2;

    public static $IS_ONLINE = [
        self::ARTICLE_IS_ONLINE_NO => '已下线',
        self::ARTICLE_IS_ONLINE_YES => '已上线',
    ];

    public static $IS_ONLINE_HTML = [
        self::ARTICLE_IS_ONLINE_NO => '<span style="color: red"><b>已下线</b></span>',
        self::ARTICLE_IS_ONLINE_YES => '<span style="color: green"><b>已上线</b></span>'
    ];

    const ARTICLE_TYPE_ONE = 1;
    const ARTICLE_TYPE_TWO = 2;

    public static $ARTICLE_TYPE = [
        self::ARTICLE_TYPE_ONE => 'code',
        self::ARTICLE_TYPE_TWO => 'word'
    ];



    /**
     *
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tag');
    }

    public function admin()
    {
        return $this->hasOne('App\\Models\\User', 'id', 'user_id');
    }

    /**
     * ɾ
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($article) {
            $article->comments()->delete();
        });
    }

}
