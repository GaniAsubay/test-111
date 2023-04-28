<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 */
class Check extends \yii\db\ActiveRecord
{

    const CHECK_OPEN = 1;
    const CHECK_CLOSED = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [['status'], 'integer'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status'
        ];
    }

    public function getDishes()
    {
        return $this->hasMany(Dish::className(), ['id' => 'dish_id'])
            ->viaTable('checks_dishes', ['check_id' => 'id']);

    }
}
