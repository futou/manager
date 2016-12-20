<title>流量赚百度积分统计</title>
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BaiduorderSearch;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BaiduorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<style>
*{ margin:0px; padding:0px;}
html,body{ padding:0px; margin: 0px;}
body { background: #e5e6e6;}
ul,li{ list-style: none;}
a{ text-decoration: none; color: #666;}
.baiduorder-index{ margin:20px 20px 20px  20px; background: #fff; padding: 10px; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33); }
table{ width:100%; border-spacing: 0px;}
th{ text-align: left; width: 20%; border-bottom: 1px solid #ddd; padding: 10px 8px;}
td{ font-size:13px; border-bottom: 1px solid #ddd; padding: 10px 8px; width: 20%; }
strong{ color: #c23531; font-size: 18px; padding: 0px 3px;}
.summary{ display: none; }
.accounts{ margin-right: 50px;}
.accounts ul li { float: left; padding:10px; border: 1px solid #ddd; margin:0px 10px 10px; font-size:12px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.1); }
.pagination{ float:right; clear:both; margin-top: 20px;}
.pagination li{ float:left; padding:5px 8px; border-radius:5px; border: 1px solid #ddd; margin:0px 5px;}
.clr{ clear:both;}
.team ul li { float: left; padding:10px; border: 1px solid #ddd; margin:0px 10px 10px; font-size:12px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.1); }
.active{ background: #c23531;}
.active a{ color: #ffffff;}
.calendar{ margin:30px 10px;}
.calendar ul li { float:left; border: 1px solid #ccc; padding: 10px; width: 11%; text-align: center; }
.calendar strong {
  padding-bottom: 10px;
}
.menu{ background: #c23531; height: 50px; line-height: 50px;}
.menu a {  color: #ffffff; float:left; width: 100px; text-align: center;}
</style>
<script src="/js/echarts.min.js"></script>
<?php echo $this->render('../_public/menu.php');?>
<div class="baiduorder-index">
  <div class="accounts">
    <ul>

      <li>今日完成任务：<strong><?=$todayCount?></strong>个</li>
      <li>预计收入：￥<strong><?=$todayIncome?></strong>元</li>
      <li>昨日完成任务：<strong><?=$yesterdayCount?></strong>个</li>
      <li>昨日收入：￥<strong><?=$yesterdayIncome?></strong>元</li>
      <li>当月收入：￥<strong><?=$monthIncome?></strong>元</li>
    </ul>
  </div>
  <div class="clr"></div>
  <div>
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],
              ['value' => 'user', 'label' => '用户'],
              // ['value' => 'sn', 'label' => '设备序列号'],
              ['value' => function($model){ return BaiduorderSearch::replaceLabel($model->pk);}, 'label' => '包名'],
              ['value' => 'score', 'label' => '积分'],
              // ['value' => 'sg', 'label' => '签名'],
              ['value' => 'created_at', 'label' => '获得时间'],
              // ['value' => 'ip', 'label' => 'IP地址'],
              // ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
    </div>
</div>
