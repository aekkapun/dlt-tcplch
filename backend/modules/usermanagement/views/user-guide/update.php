<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\guide\models\TourCompany */

$this->title = 'Update Tour Company: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tour Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tour-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
