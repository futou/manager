<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LrConference */

$this->title = 'Create Lr Conference';
$this->params['breadcrumbs'][] = ['label' => 'Lr Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lr-conference-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'columns' => [
          ['label' => '会议名称', 'value' => 'Title']
        ],
    ]) ?>

</div>
