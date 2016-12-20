<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LrConferencememberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lr Conferencemembers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lr-conferencemember-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lr Conferencemember', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'openid',
            'mobile',
            'nickname',
            'realname',
            // 'role',
            // 'photo',
            // 'cfid',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
