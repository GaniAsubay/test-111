<?php

namespace app\modules\api\models;

use app\models\Dish;

class DishApiModel extends Dish
{
    public function fields()
    {
        return [
            'id',
            'name',
            'cook' => function(Dish $data)
                {
                    return $data->cook->name;
                },
        ];
    }
}
