<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LrConference */

$this->title = 'Update Lr Conference: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lr Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lr-conference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
