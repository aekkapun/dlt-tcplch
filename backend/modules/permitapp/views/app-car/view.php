<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\AppCar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'App Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'gender',
            'fullname',
            'age',
            'passport',
            'address',
            'province',
            'country',
            'telephone',
            'car_enroll_country',
            'plates_number',
            'start_date',
            'end_date',
            'start_province',
            'start_border_point',
            'target_province',
            'out_province',
            'out_border_point',
            'request_chanel',
            'created_at',
            'updated_at',
            'cretaed_by',
            'updated_by',
            'approve_status',
            'approve_by',
            'approve_date',
            'approve_comment',
            'dlt_office',
            'dlt_br',
            'appearance',
            'brands',
            'models',
            'weight',
            'total_weight',
            'engine_no',
            'seat',
        ],
    ]) ?>

</div>
