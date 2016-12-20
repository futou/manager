<title>16赚百度积分统计</title>
<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
.accounts ul li { float: left; padding:10px; border: 1px solid #ddd; margin:0px 10px 10px; font-size:18px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.1); }
.pagination{ float:right; clear:both; margin-top: 20px;}
.pagination li{ float:left; padding:5px 8px; border-radius:5px; border: 1px solid #ddd; margin:0px 5px;}
.clr{ clear:both;}
.team ul li { float: left; padding:10px; margin:0px 10px 10px; font-size:18px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.1); }
.active{ background: #c23531;}
.active a{ color: #ffffff;}
.calendar{ margin:30px 10px; border-top: 1px solid #ccc;  border-left: 1px solid #ccc; }
.calendar ul li { float:left; border-bottom: 1px solid #ccc;  border-right: 1px solid #ccc; padding: 10px; width: 11%; text-align: center; }
.calendar strong {
  padding-bottom: 10px;
}
.menu{ background: #c23531; height: 50px; line-height: 50px;}
.menu a {  color: #ffffff; float:left; width: 100px; text-align: center;}
h3{
  border-bottom: 1px solid #ccc;
  text-indent: 36px;
  margin-bottom: 20px;
  padding-bottom: 10px;
}
</style>
<?php echo $this->render('../_public/accountMenu.php');?>
<div class="baiduorder-index">
<h3>16赚+流量赚</h3>
<div class="accounts">
  <ul>
    <li>宋智源</li>
    <li>今日完成任务：<strong><?=$todayCount?></strong>个</li>
    <li>昨日完成任务：<strong><?=$yesterdayCount?></strong>个</li>
    <li>当月完成任务：<strong><?=$monthCount?></strong>个</li>
    <!--<li>上月完成任务：<strong><?=$lastMonthCount?></strong>个</li>-->
  </ul><div class="clr"></div>
</div>
<!--
<div class="accounts">
  <ul>
    <li>张洺涛：</li>
    <li>今日完成任务：<strong><?=$todayCount?></strong>个</li>
    <li>昨日完成任务：<strong><?=$yesterdayCount?></strong>个</li>
    <li>当月完成任务：<strong><?=$monthCount?></strong>个</li>
    <li>上月完成任务：<strong><?=$lastMonthCount?></strong>个</li>
  </ul><div class="clr"></div>
</div>-->
<div class="clr"></div>

<div class="calendar">
    <ul>
  <?php
    $i = 1;
    foreach ($monthTodayCount as $key => $value) {
      echo "<li><strong>" . $i. "</strong><br />". $value . "</li>";
      $i++;
    }
  ?>
  </ul>
  <div class="clr"></div>
</div>

      <div class="clr"></div>
</div>
