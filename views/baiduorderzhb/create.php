<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaiduorderZhb */

$this->title = 'Create Baiduorder Zhb';
$this->params['breadcrumbs'][] = ['label' => 'Baiduorder Zhbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baiduorder-zhb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
