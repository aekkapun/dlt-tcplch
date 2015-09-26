<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\PermitAppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แบบคำขออนุญาต';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usermanagement-default-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file"></i> <?= Html::encode($this->title) ?></h3>
            <?= Html::a('ยื่น ' . $this->title, ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </div>
        <div class="box-body">
            <div class="permit-app-index">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>

                </p>

                <?=
                GridView::widget([
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
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

            </div>
        </div><!-- /.box-body -->
    </div>
</div>