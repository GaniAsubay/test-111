<?php

namespace app\modules\api\models;

use app\models\Cook;

class CheckApiModel extends Cook
{
    public function fields()
    {
        return [
            'id',
            'name',
            'genres' => function(Cook $data)
                {
                    return $data->genres;
                },
            'author' => function(CheckApiModel $data)
                {
                    return $data?->author->name;
                },
            'publish_dt'
        ];
    }
}
