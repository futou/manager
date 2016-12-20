<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\controllers\DatacountController;
?>
<!DOCTYPE html>
<html>
	<head>
	<title>积分统计</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <style>
    *{ margin:0px; padding:0px;}
    html,body{ padding:0px; margin: 0px;}
    body { background: #e5e6e6;}
    ul,li{ list-style: none;}
    a{ text-decoration: none; color: #666;}
    .baiduorder-index{ margin:5px; background: #fff; padding: 5px 10px; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33); }
    table{ width:100%; border-spacing: 0px;}
    th{ text-align: left; width: 20%; border-bottom: 1px solid #ddd; padding: 10px 8px;}
    td{ font-size:12px; border-bottom: 1px solid #ddd; padding: 10px 0px; width: 20%; }
    strong{ color: #c23531; font-size: 14px; }
    .summary{ display: none; }
    .accounts{ clear:both;}
    .accounts ul {
      display: block;
      height: 50px;
      clear: both;
    }
    .accounts ul li { float: left; padding:10px; border: 1px solid #ddd; margin:0px 3px 10px; font-size:12px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.1); width: 140px; }
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
    .accounts ul li.title {
      width: 60px;
      text-align: center;
    }
    td{ width: 25%; text-align: left; height: 26px;}
    td.title{ width: 20%; text-align: center;}

    </style>
</head>
<style>

</style>
<body>
<div class="baiduorder-index">
  <div class="accounts">
<table>
    <tr>
      <td class="title"><strong>16赚</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder')['day'];?>/4000</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder')['yesterday'];?>/4000</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>流量赚</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_llz')['day'];?>/4000</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_llz')['yesterday'];?>/4000</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_llz')['month'];?></strong></td>
    </tr>
    <tr>
    <td class="title"><strong>树懒赚</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_slz')['day'];?>/2000</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_slz')['yesterday'];?>/2000</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_slz')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>赚红包</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_zhb')['day'];?>/3500</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_zhb')['yesterday'];?>/3500</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_zhb')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>兑换话费</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_dhhf')['day'];?>/2000</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_dhhf')['yesterday'];?>/2000</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_dhhf')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>赚微信红包</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_zwxhb')['day'];?>/2000</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_zwxhb')['yesterday'];?>/2000</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_zwxhb')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>直播点券</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_zbdq')['day'];?>/600</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_zbdq')['yesterday'];?>/600</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_zbdq')['month'];?></strong></td>
    </tr>
    <tr>
      <td class="title"><strong>吉祥夺宝</strong></td>
      <td>当日：<strong><?=DatacountController::DataCount('baiduorder_jxdb')['day'];?>/800</strong></td>
      <td>昨日：<strong><?=DatacountController::DataCount('baiduorder_jxdb')['yesterday'];?>/800</strong></td>
      <td>当月：<strong><?=DatacountController::DataCount('baiduorder_jxdb')['month'];?></strong></td>
    </tr>
</table>
</div>
</div>
</body>
</html>
