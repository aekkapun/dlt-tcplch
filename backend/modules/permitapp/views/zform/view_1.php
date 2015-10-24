<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\web\Session;

$session = Yii::$app->session;


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
            <div class="table-responsive">
                <table class="table-bordered ">
                    <thead>
                        <tr style=" width: 150px">
                            <th>#</th>
                            <th class="text-center"><h4>รายละเอียด</h4></th>
                    <?php
                    $app_id = $session->get('id');
                    echo $app_id;
                    ?>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style=" width: 150px">ข้อมูลผู้ขออนุญาต</td>
                            <td>                        <div class="content-box">
                                    <p class="font-light dot-view" >ข้าพเจ้า<input class="dot-input2" type="text" value='<?= $model->fullname ?>'/>อายุ<input size="3" class="dot-input2" type="text" value='<?= $model->age ?>'/>ปี
                                        หมายเลขหนังสือเดินทาง <input size="15" class="dot-input2" type="text" value='<?= $model->passport ?>'/>
                                        <br/>ที่อยู่ <input size="60" class="dot-input2" type="text" value='<?= $model->address ?>'/>ประเทศ<input size="20" class="dot-input2" type="text" value='<?= $model->countries->country_name ?>'/>
                                        โทรศัพท์ <input size="14" class="dot-input2" type="text" value='<?= $model->telephone ?>'/>มีความประสงขออนุญาตนำรถที่จดทะเบียนในประเทศ<input class="dot-input2" type="text" value='<?= $model->car_enroll_country ?>'/>
                                        หมายเลขทะเบียน <input style="width: 100px" class="dot-input2" type="text" value='<?= $model->plates_number ?>'/>เข้ามาในราชอาณาจักรเป็นการชั่วคราวเพื่อให้ในการท่องเที่ยว 

                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ข้อมูลการเดินทาง</td>
                            <td><p class="font-light dot-view">ตั้งแต่วันที่ <input size="10" class="dot-input2" type="text" value='<?= Yii::$app->formatter->asDate($model->start_date, 'medium'); ?>'/>
                                    ถึงวันที่ <input size="10" class="dot-input2" type="text" value='<?= Yii::$app->formatter->asDate($model->end_date, 'medium'); ?>'/> ต้นทางที่จังหวัด<input class="dot-input2" type="text" value='<?= $model->startProvince->PRV_DESC ?>'/>
                                    ด่านพรมแดน<input size="30" class="dot-input2" type="text" value='<?= $model->startBorderPoint->border_thai ?>'/>
                                    ไปยังปลายทางที่จังหวัด<input class="dot-input2" type="text" value='<?= $model->targetProvince->PRV_DESC ?>'/>และออกจากประเทศไทยที่จังหวัด <input size="30" class="dot-input2" type="text" value='<?= $model->outProvince->PRV_DESC ?>'/>
                                    ด่านพรมแดน<input size="40" class="dot-input2" type="text" value='<?= $model->endBorderPoint->border_thai ?>'/></td>
                            </p>
                        </tr>
                        <tr>
                            <td>ข้อมูลรถ</td>
                            <td>                    
                                <div class="content-box">
                                    <p class="font-light dot-view" ></span>ลักษณะ <input class="dot-input2" type="text" value='<?= $model->appearance ?>'/>ยี่ห้อรถ<input class="dot-input2" type="text" value='<?= $model->brands ?>'/>แบบ <input class="dot-input2" type="text" value='<?= $model->models ?>'/>
                                        สี <input size="10" class="dot-input2" type="text" value='<?= $model->car_color ?>'/>น้ำหนักรถ<input size="4"  class="dot-input2" type="text" value='<?= $model->weight ?>'/>น้ำหนักรวม<input size="4" class="dot-input2" type="text" value='<?= $model->total_weight ?>'/> 
                                        เลขตัวรถ<input size="15" class="dot-input2" type="text" value='<?= $model->carbody_no ?>'/>
                                        เลขเครื่องยนต์ <input size="15" class="dot-input2" type="text" value='<?= $model->engine_no ?>'/>ที่นั่ง<input size="3" class="dot-input2" type="text" value='<?= $model->seat ?>'/><br/>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>หลักฐานประกอบ</td>
                            <td>              <?=
                                DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        [
                                            'attribute' => false,
                                            'value' => $model->listDownloadFiles('docs'), 'format' => 'html'
                                        ],
                                    ],
                                ])
                                ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bus"></i> ข้อมูล คนขับประจำรถ

                            <div class="pull-right">
                                <?php // Html::button('<i class="fa fa-user-plus"></i> เพิ่มคนขับรถ', ['value' => Url::to('index.php?r=permitapp/zform/create2&id=' . $model->id . ''), 'style' => 'padding: 2px 12px;', 'class' => 'btn btn-success ', 'id' => 'modalButton']) ?><br/>
                                 <?= Html::button('<i class="fa fa-user-plus"></i> เพิ่มคนขับรถ', ['value' => Url::to('index.php?r=permitapp/zform/createz&app_id=' . $model->id . ''), 'style' => 'padding: 2px 12px;', 'class' => 'btn btn-danger ', 'id' => 'modalButton']) ?>

                            </div>
                        </div>




                        <?php
                        Modal::begin([
                            'header' => '<h4>เพิ่มคนขับ</h4>',
                            'id' => 'modal',
                            'size' => 'modal-lg',
                        ]);

                        echo "<div id='modalContent'></div>";

                        Modal::end();
                        ?>
                        <div class="panel panel-body">
                            <?php Pjax::begin(['id' => 'branchesGrid']); ?>
                            <?=
                            GridView::widget([
                                'dataProvider' => $modelsDriver,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
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
                                        // 'blacklist_status',
                                        // 'blacklist_date',
                                        // 'comment',
                                        // 'create_at',
                                        // 'create_by',
                                        // 'update_at',
                                        // 'update_by',
                                        //['class' => 'yii\grid\ActionColumn'],
                                        ],
                                    ]);
                                    ?>
                                    <?php Pjax::end(); ?>
                        </div>                           
                    </div>
                </div>

                <div class="drivers-form">

                </div>

            </div><!-- /.box-body -->
        </div>
    </div>
