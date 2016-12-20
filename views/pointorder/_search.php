<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PointorderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pointorder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order') ?>

    <?= $form->field($model, 'app') ?>

    <?= $form->field($model, 'ad') ?>

    <?= $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'chn') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'sig') ?>

    <?php // echo $form->field($model, 'adid') ?>

    <?php // echo $form->field($model, 'pkg') ?>

    <?php // echo $form->field($model, 'device') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'trade_type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'referer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
