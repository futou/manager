<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BaiduorderLlz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baiduorder-llz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sn')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'pk')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'score')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sg')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'team')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
