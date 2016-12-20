<?php

namespace app\controllers;

use Yii;
use app\models\Baiduorder;
use app\models\BaiduorderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\Account;
/**
 * BaiduorderController implements the CRUD actions for Baiduorder model.
 */
class BaiduorderController extends Controller
{
    public $layout = false;

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
    // public function actionIndex()
    // {
    //     $team = isset($_GET['team'])?$_GET['team']:5;
    //     $m = isset($_GET['m'])?$_GET['m']:date('m');
    //     $yesterday = strtotime('-1 day');
    //     $query = new Query();
    //     $monthTodayIncome = array();
    //
    //     if ($team == 6)
    //     {
    //       for ( $i=1; $i<=date('t'); $i++ ) {
    //           $monthTodayIncome[] = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->sum('score');//当日收入
    //       }
    //       $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
    //       $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//昨日收入
    //       $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
    //       $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当日收入
    //       $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入
    //     }
    //     else if ($team == 5)
    //     {
    //
    //       for ( $i=1; $i<=date('t'); $i++ ) {
    //           $monthTodayIncome[] = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->sum('score');//当日收入
    //       }
    //       $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->count();//昨日完成数量
    //       $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->sum('score');//昨日收入
    //       $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->count();//当日完成数量
    //       $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->sum('score');//当日收入
    //       $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->sum('score');//当月收入
    //     }
    //     else {
    //       for ( $i=1; $i<=date('t'); $i++ ) {
    //           $monthTodayIncome[] = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->andWhere(['=', 'team' ,$team])->sum('score');//当日收入
    //       }
    //       $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team', $team])->count();//昨日完成数量
    //       $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team', $team])->sum('score');//昨日收入
    //       $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team', $team])->count();//当日完成数量
    //       $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team', $team])->sum('score');//当日收入
    //       $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->andWhere(['=', 'team', $team])->sum('score');//当月收入
    //     }
    //     $searchModel = new BaiduorderSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //
    //     $flag = "";
    //     $symbol = "";
    //     $money = "";
    //     $date = date("Y-m-d");
    //     for ($i=0; $i<=23; $i++)
    //     {
    //       $start = $date . " " . $i.":00:00";
    //       $end = $date . " " . ($i+1). ":00:00";
    //       if ($team == 6) {
    //           $rs = $query->from('baiduorder')->where(['between', 'created_at', $start, $end])->sum('score');
    //       }
    //       else if ($team == 5) {
    //           $rs = $query->from('baiduorder')->where(['between', 'created_at', $start, $end])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'3'])->sum('score');
    //       }
    //       else {
    //           $rs = $query->from('baiduorder')->where(['between', 'created_at', $start, $end])->andWhere(['=', 'team', $team])->sum('score');
    //       }
    //
    //       $flag = $symbol .  sprintf('%.2f', ($rs/100));
    //       $symbol = ",";
    //       $money =  $money . $flag;
    //     }
    //
    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //         'todayCount' => $todayCount,
    //         'todayIncome' => sprintf('%.2f', ($todayIncome/100)+($todayIncome/600)),
    //         'yesterdayCount'  => $yesterdayCount,
    //         'yesterdayIncome' => sprintf('%.2f', ($yesterdayIncome/100)+($yesterdayIncome/600)),
    //         // 'count' => $count,
    //         'monthIncome' => sprintf('%.2f', ($monthIncome/100)+($monthIncome/500)),
    //         // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
    //         'monthTodayIncome' => $monthTodayIncome,
    //         'money' => $money,
    //         'team' => $team,
    //         'allMonthIncome' => Account::allMonthIncome($query),
    //     ]);
    // }

    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Baiduorderslz::find(),
        // ]);
        //
        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
        $m = isset($_GET['m'])?$_GET['m']:date('m');
        $yesterday = strtotime('-1 day');
        $startDate = isset($_GET['sd'])?$_GET['sd']:date("Y-m-d 00:00:00");
        $endDate = isset($_GET['ed'])?$_GET['ed']:date("Y-m-d 23:59:59");
        $query = new Query();
        $monthTodayIncome = array();
        $yesterdayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
        $yesterdayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//昨日收入
        $todayCount = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
        $todayIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当日收入
        $monthIncome = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->sum('score');//当月收入

        // $dataProvider = new ActiveDataProvider([
        //     'query' => Baiduorder::find(),
        //     'sort' => [
        //         'defaultOrder' => [
        //             'id' => SORT_DESC,
        //         ]
        //     ],
        // ]);
        $searchModel = new BaiduorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $flag = "";
        $symbol = "";
        $money = "";
        $date = date("Y-m-d");
        $llz = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'todayCount' => $todayCount,
            'todayIncome' => sprintf('%.2f', ($todayIncome/100)*0.92),
            'yesterdayCount'  => $yesterdayCount,
            'yesterdayIncome' => sprintf('%.2f', ($yesterdayIncome/100)*0.92),
            // 'count' => $count,
            'monthIncome' => sprintf('%.2f', ($monthIncome/100)*0.92),
            // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
            'monthTodayIncome' => $monthTodayIncome,
            'money' => $money

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

    public function actionCalendar()
    {
      $team = isset($_GET['team'])?$_GET['team']:6;
      $m = isset($_GET['m'])?$_GET['m']:date('m');
      $yesterday = strtotime('-1 day');
      $query = new Query();
      $monthTodayIncome = array();
      for ( $i=1; $i<=date('t'); $i++ ) {
          $monthTodayIncome[] = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->sum('score');//当日收入
      }
      $flag = "";
      $symbol = "";
      $money = "";
      $date = date("Y-m-d");
      for ($i=0; $i<=23; $i++)
      {
        $start = $date . " " . $i.":00:00";
        $end = $date . " " . ($i+1). ":00:00";
        $rs = $query->from('baiduorder')->where(['between', 'created_at', $start, $end])->sum('score');
        $flag = $symbol .  sprintf('%.2f', ($rs/100));
        $symbol = ",";
        $money =  $money . $flag;
      }

      return $this->render('calendar', [
          'monthTodayIncome' => $monthTodayIncome
      ]);
    }

    public function actionSlz()
    {
        $m = isset($_GET['m'])?$_GET['m']:date('m');
        $yesterday = strtotime('-1 day');
        $startDate = isset($_GET['sd'])?$_GET['sd']:date("Y-m-d 00:00:00");
        $endDate = isset($_GET['ed'])?$_GET['ed']:date("Y-m-d 23:59:59");
        $query = new Query();
        $monthTodayIncome = array();
        $yesterdayCount = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'4'])->count();//昨日完成数量
        $yesterdayIncome = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'4'])->sum('score');//昨日收入
        $todayCount = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'4'])->count();//当日完成数量
        $todayIncome = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'4'])->sum('score');//当日收入
        $monthIncome = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->andWhere(['<>', 'team' ,'2'])->andWhere(['<>', 'team' ,'4'])->sum('score');//当月收入

        $dataProvider = new ActiveDataProvider([
            'query' => Baiduorderslz::find(),
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
        $llz = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'todayCount' => $todayCount,
            'todayIncome' => sprintf('%.2f', ($todayIncome/100)+(($todayIncome)/600)),
            'yesterdayCount'  => $yesterdayCount,
            'yesterdayIncome' => sprintf('%.2f', ($yesterdayIncome/100)+(($yesterdayIncome)/600)),
            // 'count' => $count,
            'monthIncome' => sprintf('%.2f', ($monthIncome/100)+(($monthIncome)/600)),
            // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
            'monthTodayIncome' => $monthTodayIncome,
            'money' => $money

        ]);
    }

}
