<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\BorderCheckpoint */

$this->title = 'Update Border Checkpoint: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Border Checkpoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="border-checkpoint-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
