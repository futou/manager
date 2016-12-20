<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LrConferencemember */

$this->title = 'Update Lr Conferencemember: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lr Conferencemembers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lr-conferencemember-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
