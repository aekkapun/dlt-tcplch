<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\guide\models\TourCompany;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserTourcompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-tourcompany-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-info">
        <div class="panel-heading">ข้อมูลบริษัท</div>
        <div class="panel-body">
            <?= $form->errorSummary($model); ?>
            <?= $form->errorSummary($modelUser); ?>
            <div class="row">
                <div class="col-md-3">
                    <?php // $form->field($model, 'license_no')->textInput() ?>
                    <?= $form->field($model, 'license_no')->textInput(['maxlength' => true, 'id' => 'license_no']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'trader_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'trader_name_en')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'trader_category')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'effective_date')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'expire_date')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'zipcode')->textInput() ?>
                </div>
                <div class="col-md-10">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'province')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'amphur')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"> ข้อมูลผู้ใช้งาน </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    username   <?= $form->field($modelUser, 'username')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-3">
                    password    <?= $form->field($modelUser, 'password')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-3">
                    confirm password    <?= $form->field($modelUser, 'confirm_password')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-3">
                    <span>สถานะ</span><?= $form->field($modelUser, 'is_block')->label(false)->radioList(['0' => 'เปิดใช้งาน', '1' => 'ระงับ']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    email    <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-6">
            <?= Html::submitButton($model->isNewRecord && $modelUser->isNewRecord? '<i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูล' : 'อัพเดทข้อมูล', ['class' => ($model->isNewRecord && $modelUser->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
        </div> 
        <div class="col-md-6 col-xs-6">
            <?= Html::resetButton($model->isNewRecord && $modelUser->isNewRecord ? '<i class="glyphicon glyphicon-refresh"></i> เคลียร์ข้อมูล' : 'คืนค่าเดิม', ['class' => ($model->isNewRecord && $modelUser->isNewRecord ? 'btn btn-danger' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
        </div> 
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
// here you right all your javascript stuff
$('UserTourcompany[license_no]').change(function(){
	var license_no = $(this).val();

	$.get('index.php?r=usermanagement/user-tourcompany/get-company-info',{ license_no : license_no },function(data){
		var data = $.parseJSON(data);
		$('#usertourcompany-trader_name').attr('value',data."trader_name);
		$('#usertourcompany-trader_name_en').attr('value',data.province);
	});
});

JS;
$this->registerJs($script);
?>
