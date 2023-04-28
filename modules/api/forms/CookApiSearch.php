<?php

namespace app\modules\api\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cook;

/**
 * CookSearch represents the model behind the forms form of `app\models\Cook`.
 */
class CookApiSearch extends Model
{
    public $date_start;
    public $date_end;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end'], 'required'],
            [['date_start', 'date_end'], 'string'],
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
        $query = Cook::find()->joinWith(['dish.checks'])->select(['cook.*', 'COUNT(checks_dishes.id) as orderDishesCount']);

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
           ['between', 'checks_dishes.created_at', $this->date_start, $this->date_end]
        ]);
        $query->orderBy('orderDishesCount DESC');
        return $dataProvider;
    }
}
