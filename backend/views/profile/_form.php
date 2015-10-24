<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\permitapp\models\AppCar;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6">
<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
<?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            ข้อมูลส่วนตัว
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <span>คำนำหน้า</span>   <?= $form->field($modelUser, 'title')->label(false)->radioList(AppCar::itemAlias('prefixs')) ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'lname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'id_no')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
<?= $form->field($modelUser, 'off_code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'br_code')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'emp_id')->textInput() ?>
                </div>
                <div class="col-md-3">
<?= $form->field($modelUser, 'org_code')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton('<i class="glyphicon glyphicon-pencil"></i> ' . Yii::t('app', 'Update'), ['class' => 'btn btn-success btn-block btn-lg']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
