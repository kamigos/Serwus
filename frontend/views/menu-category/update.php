<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RestaurantMenuCategory */

$this->title = Yii::t('menu', 'Update {modelClass}: ', [
    'modelClass' => 'Restaurant Menu Category',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('menu', 'Restaurant Menu Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('menu', 'Update');
?>
<div class="restaurant-menu-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
