<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\AppCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลคำขอ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-car-index">
    <div class="box box-succeses">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-arrow-circle-o-right"></i> <?= Html::encode($this->title) ?></h3>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ยื่น ' . $this->title, ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    //'gender',
                    'fullname',
                    //'age',
                    'passport',
                    // 'address',
                    // 'province',
                    // 'country',
                    // 'telephone',
                    // 'car_enroll_country',
                     'plates_number',
                    'start_date',
                    'end_date',
                    // 'start_province',
                    // 'start_border_point',
                    'target_province',
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
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div><!-- /.box-body -->
    </div>

</div>
