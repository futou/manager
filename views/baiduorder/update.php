<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Baiduorder */

$this->title = 'Update Baiduorder: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Baiduorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baiduorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
