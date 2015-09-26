<?php

use yii\helpers\Html;
//use yii\widgets\ActiveField;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use backend\modules\configuration\models\Province;
use backend\modules\configuration\models\Amphur;
use backend\modules\configuration\models\District;
use kartik\widgets\DepDrop;
use kartik\widgets\TypeaheadBasic;
//use kartik\widgets\DatePicker;
use kartik\date\DatePicker;
use backend\modules\permitapp\models\PermitApp;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permit-app-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <?= $form->errorSummary($model); ?>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'gender')->inline()->radioList(PermitApp::itemAlias('sex')) ?>
        </div>
        <div class="col-xs-4">
            <label>ชื่อ - นามสกุล</label><?= $form->field($model, 'fullname')->textInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?=
            $form->field($model, 'passport')->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => '99-9999-9999',
            ])
            ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'province')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'country')->textInput() ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'car_enroll_country')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'plates_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'start_date')->widget(DatePicker::ClassName(), [
                'name' => 'check_start_date',
                // 'value' => date('d-M-Y', strtotime('+2 days')),
                'options' => ['placeholder' => 'วันที่เดินทางเข้าประเทศ...'],
                'pluginOptions' => [
                    'format' => 'dd/mm/yyyy',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'end_date')->widget(DatePicker::ClassName(), [
                'name' => 'check_end_date',
                // 'value' => date('d-M-Y', strtotime('+2 days')),
                'options' => ['placeholder' => 'วันที่เดินทางออกจากประเทศก ...'],
                'pluginOptions' => [
                    'format' => 'dd/mm/yyyy',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?=
            $form->field($model, 'start_province')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG' => 1])->all(), 'PRV_CODE', 'PRV_DESC'),
                'options' => ['placeholder' => 'เลือกจังหวัด ...',
                    'id' => 'ddl-province-start'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?php // $form->field($model, 'start_border_point')->textInput() ?>
            <?=
            $form->field($model, 'start_border_point')->widget(\kartik\depdrop\DepDrop::className(), [
                'options' => ['id' => 'ddl-borderpoint',
                               'placeholder' => 'เข้า ณ ด่านพรมแดน ...'],
                'data' => [],
                'pluginOptions' => [
                    'depends' => ['ddl-province-start'],
                    'placeholder' => 'เลือก - ด่านพรมแดน...',
                    //'url' => Url::to(['/employee/get-amphur'])
                    'url' => \yii\helpers\Url::to(['/dep-drop/get-border']),
                ]
            ])
            ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'target_province')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Province::find()->all(), 'PRV_CODE', 'PRV_DESC'),
                'options' => ['placeholder' => 'เลือกจังหวัด ...',
                    'id' => 'target-province'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?=
            $form->field($model, 'out_province')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG' => 1])->all(), 'PRV_CODE', 'PRV_DESC'),
                'options' => ['placeholder' => 'เลือกจังหวัด ...',
                    'id' => 'ddl-province-out'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?php // $form->field($model, 'out_border_point')->textInput() ?>
            <?=
            $form->field($model, 'out_border_point')->widget(\kartik\depdrop\DepDrop::className(), [
                'options' => ['id' => 'ddl-borderpoint-out','placeholder' => 'ออก ณ ด่านพรมแดน...'],
                'data' => [],
                'pluginOptions' => [
                    'depends' => ['ddl-province-out'],
                    'placeholder' => 'เลือก - ด่านพรมแดน...',
                    //'url' => Url::to(['/employee/get-amphur'])
                    'url' => \yii\helpers\Url::to(['/dep-drop/get-border']),
                ]
            ])
            ?>

        </div>
        <div class="col-xs-4">

        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4">

        </div>
    </div>


    <div class="row">
        <hr/>
        <div class="col-md-6">
            <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูล' : 'อัพเดทข้อมูล', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
        </div> 
        <div class="col-md-6">
            <?= Html::resetButton($model->isNewRecord ? '<i class="glyphicon glyphicon-refresh"></i> เคลียร์ข้อมูล' : 'คืนค่าเดิม', ['class' => ($model->isNewRecord ? 'btn btn-danger' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
        </div> 
    </div>c

    <?php ActiveForm::end(); ?>

</div>
