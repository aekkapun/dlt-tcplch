<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TaskProject */

$this->title = 'Create Task Project';
$this->params['breadcrumbs'][] = ['label' => 'Task Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
