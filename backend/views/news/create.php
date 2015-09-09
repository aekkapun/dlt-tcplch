<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SiteNews */

$this->title = 'Create Site News';
$this->params['breadcrumbs'][] = ['label' => 'Site News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
