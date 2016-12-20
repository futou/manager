<?php

namespace app\controllers;

use Yii;
use app\models\BaiduorderZhb;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * BaiduorderzhbController implements the CRUD actions for BaiduorderZhb model.
 */
class BaiduorderzhbController extends Controller
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
     * Lists all BaiduorderZhb models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => BaiduorderZhb::find(),
    //     ]);
    //
    //     return $this->render('index', [
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    public function actionIndex()
    {
        $team = isset($_GET['team'])?$_GET['team']:5;
        $m = isset($_GET['m'])?$_GET['m']:date('m');
        $yesterday = strtotime('-1 day');
        $query = new Query();
        $monthTodayIncome = array();
        $yesterdayCount = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->count();//昨日完成数量
        $yesterdayIncome = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//昨日收入
        $todayCount = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();//当日完成数量
        $todayIncome = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当日收入
        $monthIncome = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-' . $m . '-01 00:00:00'), date('Y-' . $m . '-31 23:59:59')])->sum('score');//当月收入

        $dataProvider = new ActiveDataProvider([
            'query' => BaiduorderZhb::find(),
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
     * Displays a single BaiduorderZhb model.
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
     * Creates a new BaiduorderZhb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BaiduorderZhb();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BaiduorderZhb model.
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
     * Deletes an existing BaiduorderZhb model.
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
     * Finds the BaiduorderZhb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BaiduorderZhb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BaiduorderZhb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
