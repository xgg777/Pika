<?php

namespace App\Repositories;

use App\Article;

/**
 * Article Repository.
 */
class ArticleRepository extends CommonRepository
{


    public function getArticlesByTag($tag, $pageSize = 5)
    {
        return $this->model->whereHas('tags', function($q) use ($tag)
        {
            $q->where('mark', 'like', "%$tag%");

        })->where('on_line', 2)->orderBy('sort', 'asc')->orderBy('updated_at', 'desc')->paginate($pageSize);
    }

}
