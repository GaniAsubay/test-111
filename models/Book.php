<?php

namespace app\models;

use app\repositories\GenreRepository;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property int $author_id
 * @property string $publish_dt
 */
class Book extends \yii\db\ActiveRecord
{
    public $genresList = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'author_id', 'genresList', 'publish_dt'], 'required'],
            [['author_id'], 'integer'],
            [['publish_dt'], 'date', 'format' => 'yyyy-mm-dd'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author_id' => 'Author ID',
            'publish_dt' => 'Publish Dt',
        ];
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getGenres(): ActiveQuery
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])
            ->viaTable(BookGenres::tableName(), ['book_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getAuthor() : ActiveQuery
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @param $runValidation
     * @param $attributeNames
     * @return bool
     */
    public function save($runValidation = true, $attributeNames = null): bool
    {
        if (parent::save($runValidation, $attributeNames)) {
            BookGenres::deleteAll(['book_id' => $this->id]);
            foreach (GenreRepository::getAllByIds($this->genresList) as $genre) {
                $this->link('genres', $genre);
            }
            return true;
        }

        return false;
    }
}
