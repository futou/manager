<style>
.menuActive {
  background-color: #5DAC81;
}
</style>
<?php
   use yii\helpers\Url;
?>
<?php $action = Yii::$app->controller->id; ?>
<div class="menu">
  <a href="/index.php?r=baiduorder" <?php if ($action == 'baiduorder'): ?> class="menuActive" <?php endif;?>>16赚</a>
  <a href="/index.php?r=baiduorderllz" <?php if ($action == 'baiduorderllz'): ?> class="menuActive" <?php endif;?>>流量赚</a>
  <a href="/index.php?r=baiduorderzhb" <?php if ($action == 'baiduorderzhb'): ?> class="menuActive" <?php endif;?>> 赚红包</a>
  <a href="/index.php?r=baiduorderslz" <?php if ($action == 'baiduorderslz'): ?> class="menuActive" <?php endif;?>> 树懒赚</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 兑换话费</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 赚微信红包</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 直播赚</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 返利赚</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 夺宝赚</a>
  <!--
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 假期旅游网</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 美女约约约</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 乐趣赚赚钱</a>

  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 赚狗粮</a>
  <a href="/index.php?r=baiduorder/slz" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 闲人乐赚</a>
  -->

  <a href="/index.php?r=zhuan16/score" <?php if ($action == 'slz'): ?> class="menuActive" <?php endif;?>> 全部</a>
  <!--<a href="<?php echo Url::to(['', 'team' => 1]); ?>">team1</a>
  <a href="<?php echo Url::to(['', 'team' => 2]); ?>">team2</a>
  <a href="<?php echo Url::to(['', 'team' => 3]); ?>">team3</a>
  <a href="<?php echo Url::to(['', 'team' => 4]); ?>">team4</a>
  <a href="<?php echo Url::to(['', 'team' => 5]); ?>">team5</a> -->
</div>
