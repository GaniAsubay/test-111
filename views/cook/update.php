<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cook $model */

$this->title = 'Update Cook: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
