<?php

namespace app\controllers;

use Yii;
use app\models\Baiduorderslz;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * BaiduorderslzController implements the CRUD actions for Baiduorderslz model.
 */
class BaiduorderslzController extends Controller
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

    /**
     * Lists all Baiduorderslz models.
     * @return mixed
     */
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
            'todayIncome' => sprintf('%.2f', ($todayIncome/1000)*0.92),
            'yesterdayCount'  => $yesterdayCount,
            'yesterdayIncome' => sprintf('%.2f', ($yesterdayIncome/1000)*0.92),
            // 'count' => $count,
            'monthIncome' => sprintf('%.2f', ($monthIncome/1000)*0.92),
            // 'sum' => sprintf('%.2f', ($sum/100)+($sum/450)),
            'monthTodayIncome' => $monthTodayIncome,
            'money' => $money

        ]);
    }

    /**
     * Displays a single Baiduorderslz model.
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
     * Creates a new Baiduorderslz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Baiduorderslz();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Baiduorderslz model.
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
     * Deletes an existing Baiduorderslz model.
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
     * Finds the Baiduorderslz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Baiduorderslz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Baiduorderslz::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
