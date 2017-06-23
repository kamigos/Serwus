<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RestaurantMenuCategory */

$this->title = Yii::t('menu', 'Create Restaurant Menu Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('menu', 'Restaurant Menu Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-menu-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
