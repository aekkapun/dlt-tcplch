<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */

$this->title = 'Update Drivers: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drivers-update">

    <?= $this->render('_formx', [
        'model' => $model,
    ]) ?>

</div>
