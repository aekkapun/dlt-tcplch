<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Zform */

$this->title = 'แบบคำขออนุญาต - ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'รายการ', 'url' => ['index']];
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
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'center',
                        ]
                    ]
                ]);
                ?>
            <?php endforeach; ?>
            <div class="panel">
                <table>
                    <tr style="a"></tr>
                </table>
                <div class="row"> 
                    <div class="col-xs-12 box-body">
                        <div class="invoice-title text-center">
                            <h3 class="font-light">คำขออนุญาตนำรถเข้ามาในราชอาณาจักรเป็นการชั่วคราวเพื่อการท่องเที่ยว</h3>
                        </div>
                        <hr>
                        <div class="content-box">
                            <p class="font-light dot-view" ><span class="dot-view-tab"></span>ข้าพเจ้า<input class="dot-input2" type="text" value='<?= $model->fullname ?>'/>อายุ<input style="width:60px" class="dot-input2" type="text" value='<?= $model->age ?>'/>ปี
                                หมายเลขหนังสือเดินทาง <input class="dot-input2" type="text" value='<?= $model->passport ?>'/>
                                <br/>
                                อยู่บ้านเลขที่<input size="60" class="dot-input2" type="text" value='<?= $model->address ?>'/>ประเทศ<input size="20" class="dot-input2" type="text" value='<?= $model->countries->country_name ?>'/>
                                <br/>โทรศัพท์ <input class="dot-input2" type="text" value='<?= $model->telephone ?>'/>มีครวมประสงขออนุญาตนำรถที่จดทะเบียนในประเทศ<input class="dot-input2" type="text" value='<?= $model->car_enroll_country ?>'/><br/>
                                หมายเลขทะเบียน <input style="width: 100px" class="dot-input2" type="text" value='<?= $model->plates_number ?>'/>เข้ามาในราชอาณาจักรเป็นการชั่วคราวเพื่อให้ในการท่องเที่ยว 
                                ตั้งแต่วันที่ <input size="10" class="dot-input2" type="text" value='<?= Yii::$app->formatter->asDate($model->start_date, 'medium'); ?>'/>
                                <br/> ถึงวันที่ <input size="10" class="dot-input2" type="text" value='<?= Yii::$app->formatter->asDate($model->end_date, 'medium'); ?>'/> ต้นทางที่จังหวัด<input class="dot-input2" type="text" value='<?= $model->startProvince->PRV_DESC ?>'/>
                                ด่านพรมแดน<input size="30" class="dot-input2" type="text" value='<?= $model->startBorderPoint->border_thai ?>'/>
                                <br/>ไปยังปลายทางที่จังหวัด<input class="dot-input2" type="text" value='<?= $model->targetProvince->PRV_DESC ?>'/>และออกจากประเทศไทยที่จังหวัด <input size="30" class="dot-input2" type="text" value='<?= $model->outProvince->PRV_DESC ?>'/>
                                ด่านพรมแดน<input size="40" class="dot-input2" type="text" value='<?= $model->endBorderPoint->border_thai ?>'/>
                            </p>
                        </div>
                    </div>
                    <div class="invoice-title text-center">
                        <h3 class="font-light">รายละเอียดรถยนต์</h3>
                    </div>
                    <hr>
                    <div class="content-box">
                        <p class="font-light dot-view" ></span>ลักษณะ <input class="dot-input2" type="text" value='<?= $model->appearance ?>'/>ยี่ห้อรถ<input class="dot-input2" type="text" value='<?= $model->brands ?>'/>แบบ <input class="dot-input2" type="text" value='<?= $model->models ?>'/>
                            <br/>  สี <input class="dot-input2" type="text" value='<?= $model->car_color ?>'/>น้ำหนักรถ<input  class="dot-input2" type="text" value='<?= $model->weight ?>'/>น้ำหนักรวม<input class="dot-input2" type="text" value='<?= $model->total_weight ?>'/><br/> 
                            <br/> เลขตัวรถ<input size="25" class="dot-input2" type="text" value='<?= $model->carbody_no ?>'/>
                            เลขเครื่องยนต์ <input size="25" class="dot-input2" type="text" value='<?= $model->engine_no ?>'/>ที่นั่ง<input size="6" class="dot-input2" type="text" value='<?= $model->seat ?>'/><br/>
                        </p>
                    </div>
                </div>
                    <div class="invoice-title text-center">
                        <h3 class="font-light">หลักฐานที่แบบมา</h3>
                    </div>
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//                    //'id',
//                    'gender',
//                    'fullname',
//                    'age',
//                    'passport',
//                    'address',
//                    'province',
//                    'country',
//                    'telephone',
//                    'car_enroll_country',
//                    'plates_number',
//                    'start_date',
//                    'end_date',
//                    'start_province',
//                    'start_border_point',
//                    'target_province',
//                    'out_province',
//                    'out_border_point',
//                    //'request_chanel',
//                    //'created_at',
//                    //'updated_at',
//                    //'cretaed_by',
//                    //'updated_by',
//                    'approve_status',
//                    //'approve_by',
//                    //'approve_date',
//                    //'approve_comment',
//                    'dlt_office',
//                    //'dlt_br',
//                    'appearance',
//                    'brands',
//                    'models',
//                    'weight',
//                    'total_weight',
//                    'engine_no',
//                    'seat',
//                    'car_type',
//                    'owner_type',
//                    'car_color',
//                    'carbody_no',
//                    //'ref',
//                    [
//                        'label' => 'ข้อมูลรถ',
//                        'value' => $model->getCardetail(),
//                    ],
                        //'doc:ntext',
                        [
                            'attribute' =>false,
                            'value' => $model->listDownloadFiles('docs'), 'format' => 'html'
                        ],
                    ],
                ])
                ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>ข้อมูล คนขับประจำรถ</strong></h3>
                        </div>
                        <div class="panel panel-body">

                        </div>                           
                    </div>
                </div>
            </div>

        </div><!-- /.box-body -->
    </div>
</div>
