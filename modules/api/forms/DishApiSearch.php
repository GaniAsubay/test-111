<?php

namespace app\modules\api\forms;

use app\modules\api\models\CheckApiModel;
use app\modules\api\models\DishApiModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dish;

/**
 * DishSearch represents the model behind the forms form of `app\models\Dish`.
 */
class DishApiSearch extends Model
{
    public $name;
    public $cook_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['cook_id'], 'integer'],
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
        $query = DishApiModel::find()->with(['cook']);

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
            'name' => $this->name,
            'cook_id' => $this->cook_id
        ]);
        return $dataProvider;
    }
}
