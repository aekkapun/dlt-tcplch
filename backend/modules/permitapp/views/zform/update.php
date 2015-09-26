<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Zform */

$this->title = 'Update Zform: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zform-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
