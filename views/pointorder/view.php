<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pointorder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pointorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pointorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order',
            'app',
            'ad',
            'user',
            'chn',
            'points',
            'sig',
            'adid',
            'pkg',
            'device',
            'time:datetime',
            'price',
            'trade_type',
            'created_at',
            'updated_at',
            'ip',
            'referer',
        ],
    ]) ?>

</div>
