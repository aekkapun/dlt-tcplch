<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\ZformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zforms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Zform', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'gender',
            'fullname',
            'age',
            'passport',
            // 'address',
            // 'province',
            // 'country',
            // 'telephone',
            // 'car_enroll_country',
            // 'plates_number',
            // 'start_date',
            // 'end_date',
            // 'start_province',
            // 'start_border_point',
            // 'target_province',
            // 'out_province',
            // 'out_border_point',
            // 'request_chanel',
            // 'created_at',
            // 'updated_at',
            // 'cretaed_by',
            // 'updated_by',
            // 'approve_status',
            // 'approve_by',
            // 'approve_date',
            // 'approve_comment',
            // 'dlt_office',
            // 'dlt_br',
            // 'appearance',
            // 'brands',
            // 'models',
            // 'weight',
            // 'total_weight',
            // 'engine_no',
            // 'seat',
            // 'car_type',
            // 'owner_type',
            // 'car_color',
            // 'carbody_no',
            // 'ref',
            // 'doc:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
