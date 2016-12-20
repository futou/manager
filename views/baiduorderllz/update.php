<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BaiduorderLlz */

$this->title = 'Update Baiduorder Llz: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Baiduorder Llzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baiduorder-llz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
