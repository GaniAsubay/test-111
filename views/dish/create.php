<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dish $model */

$this->title = 'Create Dish';
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
