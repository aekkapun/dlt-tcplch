<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\DriversSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลคนขับรถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?=  $this->title     ?></h3>
            <p class="pull-right">
                <?= Html::button('เพิ่มข้อมูลคนขับ', ['value' => Url::to(['permitapp/drivers/create-ajax']), 'title' => 'เพิ่มข้อมูลคนขับ', 'class' => 'btn btn-success <i class="fa fa-user"></i>
', 'id' => 'activity-create-link']); ?>
            </p>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            

            <?php
            Modal::begin([
                'id' => 'activity-modal',
                'header' => '<h4 class="modal-title">สมาชิก</h4>',
                'size' => 'modal-lg',
                'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
            ]);
            Modal::end();
            ?>
            <?php Pjax::begin(['id' => 'customer_pjax_id']); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax' => true,
                'pjaxSettings' => [
                    'neverTimeout' => true,
                    'enablePushState' => false,
                    'options' => ['id' => 'CustomerGrid'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    [
                        'attribute' => 'drivers_title',
                        'format' => 'html',
                        'value' => function($data) {
                            switch ($data->drivers_title) {
                                case 1: return 'นาย';
                                case 2: return 'นาง';
                                case 3: return 'นางสาว';
                            }
                        },
                    ],
                    'drivers_name',
                    'drivers_lastname',
                    'drivers_passport',
                    'drivers_licence',
                    // 'appilcant_id',
                    // 'car_id',
                    //'status',
                    [
                        'label' => 'Active',
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function($model) {
                            return Html::a(
                                            ($model->status == 0 ? '<i class="glyphicon glyphicon-remove"></i> Not Active' : '<i class="glyphicon glyphicon-ok"></i> Active'), '#', ['class' => 'btn btn-block btn-sm' . ($model->status == 0 ? ' btn-default' : ' btn-success')]);
                        }
                            ],
                            // 'drivers_licence',
                            // 'appilcant_id',
                            // 'car_id',
                            // 'status',
                            // 'blacklist_status',
                            // 'blacklist_date',
                            // 'comment',
                            // 'create_at',
                            // 'create_by',
                            // 'update_at',
                            // 'update_by',
                            ['class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                                                    'class' => 'activity-view-link',
                                                    'title' => 'เปิดดูข้อมูล',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#activity-modal',
                                                    'data-id' => $key,
                                                    'data-pjax' => '0',
                                        ]);
                                    },
                                            'update' => function ($url, $model, $key) {
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                                    'class' => 'activity-update-link',
                                                    'title' => 'แก้ไขข้อมูล',
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#activity-modal',
                                                    'data-id' => $key,
                                                    'data-pjax' => '0',
                                        ]);
                                    },
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                            <?php Pjax::end(); ?>
                        </div>
                    </div>

                </div>
                <?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "?r=permitapp/drivers/create-ajax",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูลคนขับ");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=permitapp/drivers/view-ajax",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูลคนขับ");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=permitapp/drivers/update-ajax",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูลคนขับ");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            
        }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>