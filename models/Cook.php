<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cooks".
 *
 * @property int $id
 * @property string|null $name
 */
class Cook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    public function getDishes()
    {
        return $this->hasMany(Dish::className(), ['cook_id' => 'id']);
    }
}
