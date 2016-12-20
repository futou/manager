<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaiduorderLlz */

$this->title = 'Create Baiduorder Llz';
$this->params['breadcrumbs'][] = ['label' => 'Baiduorder Llzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baiduorder-llz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
