<?php

namespace app\repositories;

use app\models\Author;
use yii\helpers\ArrayHelper;

class AuthorRepository
{
    public static function getAuthorsList() : array
    {
        return ArrayHelper::map(Author::find()->asArray()->all(), 'id', 'name');
    }
}