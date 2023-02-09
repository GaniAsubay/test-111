<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_genres".
 *
 * @property int $id
 * @property int $genre_id
 * @property int $book_id
 */
class BookGenres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'book_id'], 'required'],
            [['genre_id', 'book_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_id' => 'Genre ID',
            'book_id' => 'Book ID',
        ];
    }
}
