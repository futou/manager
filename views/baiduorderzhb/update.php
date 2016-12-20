<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BaiduorderZhb */

$this->title = 'Update Baiduorder Zhb: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Baiduorder Zhbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="baiduorder-zhb-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
