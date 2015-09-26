<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Permit Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permit-app-view">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title   ?></h3>
        </div>
        <div class="box-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>

            <?=
            DetailView::widget([
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
                ],
            ])
            ?>
        </div><!-- /.box-body -->
    </div>
</div>
