<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string|null $name
 * @property int $cook_id
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['cook_id'], 'integer']
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
            'cook_id' => 'Cook'
        ];
    }

    public function getCook()
    {
        return $this->hasOne(Cook::className(), ['id' => 'cook_id']);
    }

    public function getChecks()
    {
        return $this->hasMany(Check::className(), ['id' => 'check_id'])
            ->viaTable('checks_dishes', ['dish_id' => 'id']);

    }
}
