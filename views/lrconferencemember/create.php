<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LrConferencemember */

$this->title = 'Create Lr Conferencemember';
$this->params['breadcrumbs'][] = ['label' => 'Lr Conferencemembers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lr-conferencemember-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
