<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\widgets\DetailView;
use backend\modules\permitapp\models\AppCar;
use kartik\popover\PopoverX;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="table-responsive">
    
</div>
<?php
//GridView::widget([
//        'dataProvider' => $dataProvider,
//        //'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'drivers_title',
//            'drivers_name',
//            'drivers_lastname',
//            'drivers_passport',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
?>
<div class="panel panel-info">
    <div class="panel-heading">##</div>
    <div class="panel-body">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="row">
                <?= $form->errorSummary($model2); ?>
            </div>
            <div class="col-md-3 col-xs-3">
                คำนำหน้า<?= $form->field($model2, 'drivers_title')->inline()->label(false)->radioList(AppCar::itemAlias('prefixs')) ?>
            </div> 
            <div class="col-md-4 col-xs-4">
                ชื่อ<?= $form->field($model2, 'drivers_name')->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div class="col-md-4 col-xs-4">
                นามสกุล<?= $form->field($model2, 'drivers_lastname')->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-6">
                หมายเลขใบอนุญาตขับรถ <?= $form->field($model2, 'drivers_passport')->textInput(['maxlength' => true])->label(false) ?>
            </div>
            <div class="col-md-6 col-xs-6">
                หมายเลขหนังสือเดินทาง<?= $form->field($model2, 'drivers_licence')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading">แนบหลักฐานให้ครบถ้วน และถูกต้องตามรายการ</div>
            <div class="penel-body well">               
                <p><i class="glyphicon glyphicon-send"></i> ภาพถ่ายหนังสือเดินทางของผู้ขับรถ   <i class="glyphicon glyphicon-send"></i>ภาพถ่ายใบอนุญาตขับรถตามลักษณะที่ขออนุญาต</p>
                    
                <div class="row">
                </div><span class="label label-danger">กรุณาตั้งชื่อไฟล์ ตามชนิดเอกสาร</span>
                <?php
                echo PopoverX::widget([
                    'header' => 'การตั้งชื่อเอกสาร',
                    'type' => PopoverX::TYPE_INFO,
                    'placement' => PopoverX::ALIGN_TOP,
                    'size' => PopoverX::SIZE_LARGE,
                    'content' => Html::img('images/sampledoc.gif'),
                    //'footer' => 'เพื่อความรวดเร็วในการตรวจสอบข้อมูล',
                    'toggleButton' => ['label' => 'คลิก เพื่อดูตัวอย่าง', 'class' => 'label label-primary'],
                ]);
                ?>
                <?=
                $form->field($model2, 'docs[]')->widget(FileInput::classname(), [
                    'options' => [
                        //'accept' => 'image/*',
                        'multiple' => true
                    ],
                    'pluginOptions' => [
                        'initialPreview' => $model2->initialPreview($model2->docs, 'docs', 'file'),
                        'initialPreviewConfig' => $model2->initialPreview($model2->docs, 'docs', 'config'),
                        'allowedFileExtensions' => ['pdf', 'jpg', 'png', 'docx', 'xls', 'xlsx'],
                        'showPreview' => true,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => true,
                        'overwriteInitial' => false
                    ]
                ])->label(false);
                ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model2->isNewRecord ? '<i class="fa fa-plus"></i> เพิ่มข้อมูลคนขับ' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>    
</div>
