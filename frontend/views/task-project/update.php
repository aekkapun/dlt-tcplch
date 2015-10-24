<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TaskProject */

$this->title = 'Update Task Project: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Task Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
