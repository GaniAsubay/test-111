<?php

namespace app\modules\api\forms;

use app\modules\api\models\CheckApiModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the forms form of `app\models\Book`.
 */
class CheckApiSearch extends Model
{
    public $author_name;
    public $genre;
    public $publish_dt;
    public $author_country;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_name', 'author_country', 'genre'], 'string'],
            [['publish_dt'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * Creates data provider instance with forms query applied
     *
     * @param array $params
     *
     */
    public function search($params)
    {
        $query = CheckApiModel::find()->joinWith(['genres', 'author']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1
            ]
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'author.name' => $this->author_name,
            'author.country' => $this->author_country,
            'book.publish_dt' => $this->publish_dt,
            'genre.name' => $this->genre
        ]);
        return $dataProvider;
    }
}
