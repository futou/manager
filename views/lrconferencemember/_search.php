<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LrConferencememberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lr-conferencemember-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'openid') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'realname') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'cfid') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
