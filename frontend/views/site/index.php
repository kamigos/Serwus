<?php

/* @var $this yii\web\View */
$this->title = Yii::$app->name;
echo \lajax\translatemanager\widgets\ToggleTranslate::widget();
use lajax\translatemanager\helpers\Language as Lx;
?>

<div class="site-index">
    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <?= \lajax\translatemanager\widgets\ToggleTranslate::widget()?>
        <?=Lx::t('category', 'Apple')?>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p>
            <a href="http://www.yiiframework.com" class="btn btn-lg btn-success">Get started with Yii</a>
            <a href="https://github.com/Beaten-Sect0r/yii2-core" class="btn btn-lg btn-primary">Yii2 Core on GitHub</a>
            <a href="https://github.com/Beaten-Sect0r/yii2-core/issues" class="btn btn-lg btn-danger">Find a bug?</a>
        </p>
    </div>
</div>
