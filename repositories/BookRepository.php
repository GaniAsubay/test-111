<?php

namespace app\repositories;

use app\models\Author;
use app\models\Book;
use app\models\BookGenres;
use yii\helpers\ArrayHelper;

class BookRepository
{
    public static function getBookGenresList(int $bookId) : array
    {
        return BookGenres::find()->select(['genre_id'])->where(['book_id' => $bookId])->column();
    }
}