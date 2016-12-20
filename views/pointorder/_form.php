<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pointorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pointorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'app')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ad')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'chn')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'sig')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'adid')->textInput() ?>

    <?= $form->field($model, 'pkg')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'device')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'trade_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'referer')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
