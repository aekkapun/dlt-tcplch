<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\Customs */

$this->title = 'Update Customs: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
