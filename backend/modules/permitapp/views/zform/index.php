<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\modules\permitapp\models\Drivers;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\ZformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แบบคำขออนุญาต';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zform-index">
    <div class="box box-primary">
        <?php
        Modal::begin([
            'id' => 'myModal',
            'header' => '<h4 class="modal-title">...</h4>',
        ]);

        echo '...';

        Modal::end();
        ?>
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file"></i> <?= Html::encode($this->title) ?></h3>
            <?= Html::a('ยื่น ' . $this->title, ['create'], ['class' => 'btn btn-success pull-right']) ?>

        </div>
        <div class="box-body">
            <div class="permit-app-index">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        //'gender',
                        'fullname',
                        //'age',
                        [
                            'label' => 'Passport',
                            'value' => function($model) {
                                return $model->passport;
                            },
                            'options' => ['style' => 'width:60px;'],
                        ],
                        // 'address',
                        // 'province',
                        // 'country',
                        // 'telephone',
                        // 'car_enroll_country',
                        [
                            'header' => 'ทะเบียนรถ',
                            'value' => function($model) {
                                return $model->plates_number;
                            },
                            'options' => ['style' => 'width:20px;'],
                        ],
                        [
                            'label' => 'วดป(เข้า)',
                            'value' => function($model) {
                                //return $model->start_date;
                                Yii::$app->formatter->locale = 'th_TH';
                                return Yii::$app->formatter->asDate($model->start_date, 'short');
                            }
                        ],
                        [
                            'label' => 'วดป(ออก)',
                            'value' => function($model) {
                                //return $model->start_date;
                                return Yii::$app->formatter->asDate($model->end_date, 'medium');
                            }
                        ],
                        // 'start_province',
                        // 'start_border_point',
                        //'target_province',
                        [
                            'header' => 'ปลายทางที่',
                            'value' => function ($model) {
                                return $model->targetProvince->PRV_DESC;
                            }
                        ],
                        [
                            'header' => 'คนขับ',
                            'format' => 'raw',
                            'value' => function ($data) {
                                $count = Drivers::find()
                                        ->where([
                                            'appilcant_id' => $data->id,
                                        ])
                                        ->count();

                                if (!empty($count)) {
                                    return Html::a($count, ['detail', 'app_id' => $data->id], [
                                                'data-toggle' => "modal",
                                                'data-target' => "#myModal",
                                                'data-title' => "Detail Data",
                                    ]); // ubah ini
                                } else {
                                    return "-";
                                }
                            }
                                ],
                                [
                                    'options' => ['style' => 'width:50px;'],
                                    'format' => 'raw',
                                    'label' => 'วัน',
                                    'value' => function($model) {
                                return $model->dateDiff();
                            }
                                ],
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
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'options' => ['style' => 'width:150px;'],
                                    'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{create-mpdf}{view}{update}{delete}</div>',
                                    'buttons' => [
                                        'create-mpdf' => function($url, $model, $key) {
                                            return Html::a('<i class="fa fa-print"></i>', $url, ['class' => 'btn btn-default','target'=>'blank']);
                                        },
                                                'view' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon-eye-open"></i>', $url, ['class' => 'btn btn-default']);
                                        },
                                                'update' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-default']);
                                        },
                                                'delete' => function($url, $model, $key) {
                                            return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                                        'title' => Yii::t('yii', 'Delete'),
                                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                        'data-method' => 'post',
                                                        'data-pjax' => '0',
                                                        'class' => 'btn btn-default'
                                            ]);
                                        }
                                            ]
                                        ],
                                    ],
                                ]);
                                ?>


            </div>
        </div><!-- /.box-body -->
    </div>
</div>