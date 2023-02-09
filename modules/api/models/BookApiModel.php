<?php

namespace app\modules\api\models;

use app\models\Book;

class BookApiModel extends Book
{
    public function fields()
    {
        return [
            'id',
            'name',
            'genres' => function(Book $data)
                {
                    return $data->genres;
                },
            'author' => function(BookApiModel $data)
                {
                    return $data?->author->name;
                },
            'publish_dt'
        ];
    }
}
