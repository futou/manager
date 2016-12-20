<?php

namespace app\controllers;

use Yii;
use app\models\Account;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\Baiduorder;
use app\models\BaiduorderSearch;
use yii\db\Query;
/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends Controller
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

    public function beforeAction($action)
    {
      if (!Yii::$app->user->isGuest) {
         return true;
      }
      else {
        $this->redirect('/index.php?r=site/login');
      }
      return false;
    }

    /**
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex()
    {
        $team = isset($_GET['team'])?$_GET['team']:yii::$app->user->identity->team;
        $m = isset($_GET['m'])?$_GET['m']:date('m');
        $query = new Query();
        $monthTodayIncome = array();
        $count = $query->from('baiduorder')->andWhere(['=', 'team', $team])->count('id'); //累积完成任务数量
        if ($team == 4)
        {
          $yesterdayCount = $this->yesterdayCount($query, $team);//昨日完成数量
          $todayCount = $this->todayCount($query, $team);
          $monthCount = $this->monthCount($query, $team, $m);
          $lastMonthCount = $this->lastMonthCount($query, $team);
        }
        $searchModel = new BaiduorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'todayCount' => $todayCount,
            'yesterdayCount'  => $yesterdayCount,
            'monthCount' => $monthCount,
            'monthTodayCount'  => $this->monthTodayCount($query, $team, $m),
            'lastMonthCount'  => $lastMonthCount,
            'count'  => $count
        ]);
    }

    /**
     * Displays a single Account model.
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
     * Creates a new Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Account();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Account model.
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
     * Deletes an existing Account model.
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
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //前一天完成量
    public function yesterdayCount($query, $team)
    {
      $yesterday = strtotime('-1 day');
      $baidu = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' , $team])->count();
      $baidullz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' , $team])->count();
      return $baidu + $baidullz;
    }
    //当日完成数量
    public function todayCount($query, $team)
    {
       $baidu    = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $team])->count();
       $baidullz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $team])->count();
       return $baidu + $baidullz;
    }

    //当月完成
    public function monthCount($query, $team, $m)
    {
      $baidu = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->andWhere(['=', 'team' , $team])->count();
      $baidullz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->andWhere(['=', 'team' , $team])->count();
      return $baidu + $baidullz;
    }

    //上月完成
    public function lastMonthCount($query, $team)
    {
      $lastMonth = date('m', strtotime('-1 month'));
      $baidu = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $lastMonth . '-01 00:00:00'), date('Y-' . $lastMonth . '-31 23:59:59')])->andWhere(['=', 'team' , $team])->count();//上月完成
      $baidullz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-' . $lastMonth . '-01 00:00:00'), date('Y-' . $lastMonth . '-31 23:59:59')])->andWhere(['=', 'team' , $team])->count();//上月完成
      return $baidu + $baidullz;
    }

    //月份列表
    public function monthTodayCount($query, $team, $m)
    {
      for ( $i=1; $i<=date('t'); $i++ ) {
          $baidu = $query->from('baiduorder')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->andWhere(['=', 'team' , $team])->count();
          $baidullz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-' . $m . '-' .$i. ' 00:00:00'), date('Y-' . $m . '-'. $i .' 23:59:59')])->andWhere(['=', 'team' , $team])->count();
          $monthTodayCount[] = $baidu + $baidullz;
      }
      return $monthTodayCount;
    }

}
