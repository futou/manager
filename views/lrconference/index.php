<title>16赚百度积分统计</title>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="lr-conference-index">

    <h1>会议列表</h1>

    <p>
        <?= Html::a('Create Lr Conference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
              'value' => 'title',
              'label' => '会议名称'
            ],
            [
              'value' => 'address',
              'label' => '会议地点'
            ],
            [
              'value' => 'tftime',
              'label' => '会议时间'
            ],
            [
              'value' => function($model)
              {
                $msg = '需要验证';
                if ($model->mobilestate == 1){
                    $msg = '无需验证';
                }
                return $msg;
              },
              'label' => '手机验证'
            ],
            // 'created_at',
            // 'update_at',
            [
              'value' => function($model)
              {
                return "http://bbd.syblxd.com/cfsignin?cfid=".$model->id;
              },
              'label' => '屏幕显示地址'
            ],

            [
              'value' => function($model)
              {
                return "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxaee7573657ab930a&redirect_uri=http://bbd.syblxd.com/cfsignin/create?id=$model->id&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
              },
              'label' => '微信会议地址'
            ],
            [
              'label' => "参会人员统计",
              'value' => function ($model)
              {
                return "http://other.marsdeng.com/index.php?r=lrconferencemember%2Findex&page=1&cfid=$model->id";
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
