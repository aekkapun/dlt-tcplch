<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Zform */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zform-view">
    <div class="box box-primary">
        <div class="box-header with-border">
            <p class="pull-right">
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
        </div>
        <div class="box-body">
            <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                <?php
                echo \kartik\widgets\Growl::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                    'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                    'showSeparator' => true,
                    'delay' => 1, //This delay is how long before the message shows
                    'pluginOptions' => [
                        'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                        'placement' => [
                            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                        ]
                    ]
                ]);
                ?>
            <?php endforeach; ?>



            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
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
                    //'request_chanel',
                    //'created_at',
                    //'updated_at',
                    //'cretaed_by',
                    //'updated_by',
                    'approve_status',
                    //'approve_by',
                    //'approve_date',
                    //'approve_comment',
                    'dlt_office',
                    //'dlt_br',
                    'appearance',
                    'brands',
                    'models',
                    'weight',
                    'total_weight',
                    'engine_no',
                    'seat',
                    'car_type',
                    'owner_type',
                    'car_color',
                    'carbody_no',
                    //'ref',
                    [
                        'label' => 'ข้อมูลรถ',
                        'value' => $model->getCardetail(),
                    ],
                    //'doc:ntext',
                    ['attribute' => 'docs', 'value' => $model->listDownloadFiles('docs'), 'format' => 'html'],
                ],
            ])
            ?>
        </div><!-- /.box-body -->
    </div>
</div>
