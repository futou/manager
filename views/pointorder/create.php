<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pointorder */

$this->title = 'Create Pointorder';
$this->params['breadcrumbs'][] = ['label' => 'Pointorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pointorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
