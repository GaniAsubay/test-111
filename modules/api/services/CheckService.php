<?php
namespace app\modules\api\services;
use app\models\Check;

class CheckService
{
    /**
     * @return int
     * @throws \yii\db\Exception
     */
    public static function openCheck() : int
    {
        $model = new Check(['status' => Check::CHECK_OPEN]);
        if ($model->save(false) === false) {
            throw new \yii\db\Exception('save check error');
        }

        return $model->id;
    }
}