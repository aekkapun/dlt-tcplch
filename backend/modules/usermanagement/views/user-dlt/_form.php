<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\permitapp\models\AppCar;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserDlt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-dlt-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <span>คำนำหน้า</span>   <?= $form->field($model, 'title')->label(false)->radioList(AppCar::itemAlias('prefixs')) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'id_no')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
<?= $form->field($model, 'off_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'br_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'emp_id')->textInput() ?>
        </div>
        <div class="col-md-3">
<?= $form->field($model, 'org_code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"> username && password </div>
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
        <hr/>
        <div class="col-md-6 col-xs-6">
<?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูล' : 'อัพเดทข้อมูล', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
        </div> 
        <div class="col-md-6 col-xs-6">
<?= Html::resetButton($model->isNewRecord ? '<i class="glyphicon glyphicon-refresh"></i> เคลียร์ข้อมูล' : 'คืนค่าเดิม', ['class' => ($model->isNewRecord ? 'btn btn-danger' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
        </div> 
    </div>

<?php ActiveForm::end(); ?>

</div>
