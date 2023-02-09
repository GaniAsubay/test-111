<?php

namespace app\repositories;

use app\models\Author;
use app\models\Genre;
use yii\helpers\ArrayHelper;

class GenreRepository
{
    public static function getGenresList() : array
    {
        return ArrayHelper::map(Genre::find()->asArray()->all(), 'id', 'name');
    }

    /**
     * @param array $ids
     * @return array
     */
    public static function getAllByIds(array $ids) : array
    {
        return Genre::find()->where(['in', 'id', $ids])->all();
    }
}