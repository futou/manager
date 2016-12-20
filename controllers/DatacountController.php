<?php

namespace app\controllers;

use yii\db\Query;

class DatacountController extends \yii\web\Controller
{
    public $layout = false;

    public function actionIndex()
    {
      $m = isset($_GET['m'])?$_GET['m']:date('m');
      $yesterday = strtotime('-1 day');
      $startDate = isset($_GET['sd'])?$_GET['sd']:date("Y-m-d 00:00:00");
      $endDate = isset($_GET['ed'])?$_GET['ed']:date("Y-m-d 23:59:59");
      $query = new Query();
      $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
      $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
      $monthCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->count();//当月收入
      return $this->render('index');
    }

    public static function DataCount($tableName)
    {
      $m = isset($_GET['m'])?$_GET['m']:date('m');
      $yesterday = strtotime('-1 day');
      $startDate = isset($_GET['sd'])?$_GET['sd']:date("Y-m-d 00:00:00");
      $endDate = isset($_GET['ed'])?$_GET['ed']:date("Y-m-d 23:59:59");
      $query = new Query();
      $todayCount = $query->from($tableName)->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
      $yesterdayCount = $query->from($tableName)->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
      $monthCount = $query->from($tableName)->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->count();//当月收入
      return ['day' => $todayCount, 'yesterday' => $yesterdayCount, 'month' => $monthCount];
    }
}
