<?php

namespace app\controllers;

use Yii;
use app\models\Baiduorder;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\Account;
/**
 * Zhuan16Controller implements the CRUD actions for Baiduorder model.
 */
class Zhuan16Controller extends Controller
{
    public $layout=false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // public function beforeAction($action)
    // {
      // if (!Yii::$app->user->isGuest) {
      //    return true;
      // }
      // else {
      //   $this->redirect('http://other.com/index.php?r=site/login');
      // }
      // return false;
    // }

    /**
     * Lists all Baiduorder models.
     * @return mixed
     */
    public function actionIndex()
    {
      $team = isset($_GET['team'])?$_GET['team']:5;
      $m = isset($_GET['m'])?$_GET['m']:date('m');
      $yesterday = strtotime('-1 day');
      $query = new Query();
      $monthTodayIncome = array();
      $team = isset($_GET['team'])?$_GET['team']:1;
      // $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
      // $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//昨日收入
      $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
      // $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当日收入
      // $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->sum('score');//当月收入

      $dataProvider = new ActiveDataProvider([
          'query' => Baiduorder::find(),
          'pagination' => ['pageSize' => 10],
          'sort' => [
              'defaultOrder' => [
                  'id' => SORT_DESC,
              ]
          ],
      ]);
      $flag = "";
      $symbol = "";
      $money = "";
      $date = date("Y-m-d");


      return $this->render('index', [

          'dataProvider' => $dataProvider,
          'todayCount' => $todayCount,
          'yesterdayCount'  => 0,
          // 'count' => $count,
          // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
          'money' => $money,
          'team' => $team,
          'incount' => Account::allInCount($query, 0),
          'incount1' => Account::allInCount($query, 1),
          'incount2' => Account::allInCount($query, 2),
          'incount3' => Account::allInCount($query, 3),
          'incount4' => Account::allInCount($query, 4),
          'incount5' => Account::allInCount($query, 5),
          'incount6' => Account::allInCount($query, 6),
          'incount7' => Account::allInCount($query, 7),
          'incount8' => Account::allInCount($query, 9),
          'allYesterdayInCount' => Account::allYesterdayInCount($query, 0),
          'allYesterdayInCount1' => Account::allYesterdayInCount($query, 1),
          'allYesterdayInCount2' => Account::allYesterdayInCount($query, 2),
          'allYesterdayInCount3' => Account::allYesterdayInCount($query, 3),
          'allYesterdayInCount4' => Account::allYesterdayInCount($query, 4),
          'allYesterdayInCount5' => Account::allYesterdayInCount($query, 5),
          'allYesterdayInCount6' => Account::allYesterdayInCount($query, 6),
          'allYesterdayInCount7' => Account::allYesterdayInCount($query, 7),
          'allYesterdayInCount8' => Account::allYesterdayInCount($query, 9),
          'yesterdayincount' => Account::allYesterdayInCount($query),
          'monthincount' => Account::allMonthInCount($query, 0),
          'monthincount1' => Account::allMonthInCount($query, 1),
          'monthincount2' => Account::allMonthInCount($query, 2),
          'monthincount3' => Account::allMonthInCount($query, 3),
          'monthincount4' => Account::allMonthInCount($query, 4),
          'monthincount5' => Account::allMonthInCount($query, 5),
          'monthincount6' => Account::allMonthInCount($query, 6),
          'monthincount7' => Account::allMonthInCount($query, 7),
          'monthincount8' => Account::allMonthInCount($query, 9),
      ]);
    }

    /**
     * Displays a single Baiduorder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Baiduorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Baiduorder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Baiduorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Baiduorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Baiduorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Baiduorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Baiduorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionScore()
    {
      $team = isset($_GET['team'])?$_GET['team']:5;
      $m = isset($_GET['m'])?$_GET['m']:date('m');
      $yesterday = strtotime('-1 day');
      $query = new Query();
      $monthTodayIncome = array();
      $team = isset($_GET['team'])?$_GET['team']:1;
      $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
      $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//昨日收入
      $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
      $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当日收入
      $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->sum('score');//当月收入

      $dataProvider = new ActiveDataProvider([
          'query' => Baiduorder::find(),
          'pagination' => ['pageSize' => 10],
          'sort' => [
              'defaultOrder' => [
                  'id' => SORT_DESC,
              ]
          ],
      ]);
      $flag = "";
      $symbol = "";
      $money = "";
      $date = date("Y-m-d");


      return $this->render('score', [

          'dataProvider' => $dataProvider,
          'todayCount' => $todayCount,
          'todayIncome' => sprintf('%.2f', ($todayIncome/100)*0.92),
          'yesterdayCount'  => $yesterdayCount,
          'yesterdayIncome' => sprintf('%.2f', ($yesterdayIncome/100)*0.92),
          // 'count' => $count,
          'monthIncome' => sprintf('%.2f', ($monthIncome/100)*0.92),
          // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
          'monthTodayIncome' => $monthTodayIncome,
          'money' => $money,
          'team' => $team,
          'allMonthIncome' => Account::allMonthIncome(0),
          'allMonthIncome1' => Account::allMonthIncome(1),
          'allMonthIncome2' => Account::allMonthIncome(2),
          'allMonthIncome3' => Account::allMonthIncome(3),
          'allMonthIncome4' => Account::allMonthIncome(4),
          'allMonthIncome5' => Account::allMonthIncome(5),
          'allMonthIncome6' => Account::allMonthIncome(6),
          'allMonthIncome7' => Account::allMonthIncome(7),
          'allMonthIncome8' => Account::allMonthIncome(9),
          'allDayIncome' => Account::allDayIncome(0),
          'allYesterdayIncome' => Account::allYesterdayIncome($query),
          'allYesterdayIncome1' => Account::allYesterdayIncome($query, 1),
          'allYesterdayIncome2' => Account::allYesterdayIncome($query, 2),
          'allYesterdayIncome3' => Account::allYesterdayIncome($query, 3),
          'allYesterdayIncome4' => Account::allYesterdayIncome($query, 4),
          'allYesterdayIncome5' => Account::allYesterdayIncome($query, 5),
          'allYesterdayIncome6' => Account::allYesterdayIncome($query, 6),
          'allYesterdayIncome7' => Account::allYesterdayIncome($query, 7),
          'allYesterdayIncome8' => Account::allYesterdayIncome($query, 9),
          'incount' => Account::allInCount($query, 0),
          'incount1' => Account::allInCount($query, 1),
          'incount2' => Account::allInCount($query, 2),
          'incount3' => Account::allInCount($query, 3),
          'incount4' => Account::allInCount($query, 4),
          'incount5' => Account::allInCount($query, 5),
          'incount6' => Account::allInCount($query, 6),
          'incount7' => Account::allInCount($query, 7),
          'incount8' => Account::allInCount($query, 9),
          'allYesterdayInCount' => Account::allYesterdayInCount($query, 0),
          'allYesterdayInCount1' => Account::allYesterdayInCount($query, 1),
          'allYesterdayInCount2' => Account::allYesterdayInCount($query, 2),
          'allYesterdayInCount3' => Account::allYesterdayInCount($query, 3),
          'allYesterdayInCount4' => Account::allYesterdayInCount($query, 4),
          'allYesterdayInCount5' => Account::allYesterdayInCount($query, 5),
          'allYesterdayInCount6' => Account::allYesterdayInCount($query, 6),
          'allYesterdayInCount7' => Account::allYesterdayInCount($query, 7),
          'allYesterdayInCount8' => Account::allYesterdayInCount($query, 9),
          'yesterdayincount' => Account::allYesterdayInCount($query),
          'monthincount' => Account::allMonthInCount($query, 0),
          'monthincount1' => Account::allMonthInCount($query, 1),
          'monthincount2' => Account::allMonthInCount($query, 2),
          'monthincount3' => Account::allMonthInCount($query, 3),
          'monthincount4' => Account::allMonthInCount($query, 4),
          'monthincount5' => Account::allMonthInCount($query, 5),
          'monthincount6' => Account::allMonthInCount($query, 6),
          'monthincount7' => Account::allMonthInCount($query, 7),
          'monthincount8' => Account::allMonthInCount($query, 9),
      ]);
    }

    public function actionMyscore()
    {
        echo self::DataCount();
        echo self::DataCount(2);
        echo self::DataCount(3);
    }

    public static function DataCount($dateType = 1)
    {

      if ($dateType == 1) {
          $startDate = date('Y-m-d 00:00:00');
          $endDate = date('Y-m-d 23:59:59');
      }
      if ($dateType == 2) {
          $startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
          $endDate = date('Y-m-d 23:59:59', strtotime('-1 day'));
      }
      if ($dateType == 3) {
          $startDate = date('Y-m-01 00:00:00');
          $endDate = date('Y-m-t 23:59:59'); //当月
      }

      $sql = "select (select count(1) from baiduorder where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_llz where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_dhhf where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_slz where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_zhb where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_zwxhb where created_at between '$startDate' and '$endDate' and team < 16) +
              (select count(1) from baiduorder_jxdb where created_at between '$startDate' and '$endDate' and team < 16) 
              as all_count";
      $connection  = Yii::$app->db;
      $command = $connection->createCommand($sql);
      $res     = $command->queryOne();
      return $res['all_count'];
    }

    public static function actionDatacount()
    {
      $team = isset($_GET['team'])?$_GET['team']:"";
      $dateType = isset($_GET['type'])?$_GET['type']:1;
      $groupType = isset($_GET['group'])?$_GET['group']:"";
      $addCount = 0;
      if ($dateType == 1) {
          $startDate = date('Y-m-d 00:00:00');
          $endDate = date('Y-m-d 23:59:59');
      }
      if ($dateType == 2) {
          $startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
          $endDate = date('Y-m-d 23:59:59', strtotime('-1 day'));
      }
      if ($dateType == 3) {
          $startDate = date('Y-m-01 00:00:00');
          $endDate = date('Y-m-t 23:59:59'); //当月
      }

      if (!empty($team)) {
          $team = ' and team = ' . $team;
      }

      if ($groupType == 1) {
      	$group = ' and team in(4,5,6,7,8,9,11,13,20,24,25)';
      }
      else {
      	$group = $group = ' and team in(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24,25)';;
      }

        $sql = "select (select count(1) from baiduorder where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_llz where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_dhhf where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_slz where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zhb where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zwxhb where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zbdq where created_at between '$startDate' and '$endDate' $team $group)  +
                (select count(1) from baiduorder_jxdb where created_at between '$startDate' and '$endDate' $team $group) 
                as all_count";
        $connection  = Yii::$app->db;
        $command = $connection->createCommand($sql);
        $res     = $command->queryOne();
		return $res['all_count']+$addCount;
    }

	public static function actionDatacount2()
    {
      $team = isset($_GET['team'])?$_GET['team']:"";
      $dateType = isset($_GET['type'])?$_GET['type']:1;
      $groupType = isset($_GET['group'])?$_GET['group']:"";
      if ($dateType == 1) {
          $startDate = date('Y-m-d 00:00:00');
          $endDate = date('Y-m-d 23:59:59');
      }
      if ($dateType == 2) {
          $startDate = date('Y-m-d 0:00:00', strtotime('-1 day'));
          $endDate = date('Y-m-d 23:59:59', strtotime('-1 day'));
      }
      if ($dateType == 3) {
          $startDate = date('Y-m-10 06:00:00');
          $endDate = date('Y-m-t 23:59:59'); //当月
      }

      if (!empty($team)) {
        $team = ' and team = ' . $team;
      }

      if ($groupType == 1) {
      	$group = " and team in(4,5,6,7,8,9,11,13,20,21) and created_at > '2016-12-10 06:00:00' ";
      }
      else if ($groupType == 2) { 
      	$group  = " and team in(1,2,3,10,12,14,15,17,18,19,22,23) and created_at > '2016-12-10 06:00:00' ";
      }
      else {
      	$group = "";
      }

        $sql = "select (select count(1) from baiduorder where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_llz where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_dhhf where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_slz where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zhb where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zwxhb where created_at between '$startDate' and '$endDate' $team $group) +
                (select count(1) from baiduorder_zbdq where created_at between '$startDate' and '$endDate' $team $group)  +
                (select count(1) from baiduorder_jxdb where created_at between '$startDate' and '$endDate' $team $group) 
                as all_count";
        $connection  = Yii::$app->db;
        $command = $connection->createCommand($sql);
        $res     = $command->queryOne();
		return $res['all_count'];
    }

}
