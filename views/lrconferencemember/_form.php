<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LrConferencemember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lr-conferencemember-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'openid')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cfid')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
