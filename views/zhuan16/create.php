<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Baiduorder */

$this->title = 'Create Baiduorder';
$this->params['breadcrumbs'][] = ['label' => 'Baiduorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baiduorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
