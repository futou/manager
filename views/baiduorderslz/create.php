<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Baiduorderslz */

$this->title = 'Create Baiduorderslz';
$this->params['breadcrumbs'][] = ['label' => 'Baiduorderslzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="baiduorderslz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
