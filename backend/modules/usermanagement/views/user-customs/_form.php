<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\usermanagement\models\Title;
use backend\modules\configuration\models\Province;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserCustoms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-customs-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <span>คำนำหน้า</span>   <?=
    $form->field($model, 'title')->label(false)->radioList(
            ArrayHelper::map(Title::find()->all(), 'id', 'title')
    )
    ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'id_no')->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => '9-9999-99999-99-9',
            ])->label()
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php // $form->field($model, 'off_code')->textInput(['maxlength' => true])  ?>
            <?=
            $form->field($model, 'off_code')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG' => 1])->all(), 'PRV_CODE', 'PRV_DESC'),
                'options' => ['placeholder' => 'เลือกจังหวัด ...',
                    'id' => 'ddl-province-start',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label();
            ?>
        </div>
        <div class="col-md-3">
            <?php // $form->field($model, 'br_code')->textInput(['maxlength' => true]) ?>
            <?=
            $form->field($model, 'br_code')->widget(\kartik\depdrop\DepDrop::className(), [
                'options' => ['id' => 'ddl-borderpoint',
                    'placeholder' => 'ประจำ ด่านพรมแดน ...'],
                'data' => $border_start,
                'pluginOptions' => [
                    'depends' => ['ddl-province-start'],
                    'placeholder' => 'เลือก - ด่านพรมแดน...',
                    //'url' => Url::to(['/employee/get-amphur'])
                    'url' => \yii\helpers\Url::to(['/dep-drop/get-border']),
                ]
            ])->label()
            ?>
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
