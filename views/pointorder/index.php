<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PointorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pointorders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pointorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pointorder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['value' => 'order' ,'label' => '订单编号'],
            // 'app',
            'ad',
            'user',
            'chn',
            'points',
            'sig',
            'adid',
            // 'pkg',
            'device',
            'time:datetime',
            ['value' => 'price' ,'label' => '金额'],
            'trade_type',
            'created_at',
            // 'updated_at',
            // 'ip',
            // 'referer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
