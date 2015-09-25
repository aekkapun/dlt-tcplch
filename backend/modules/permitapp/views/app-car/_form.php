<?php

use yii\helpers\Html;
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
/* @var $model backend\modules\permitapp\models\AppCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <?= $form->errorSummary($model); ?>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">ข้อมูล รายละเอียดคำขอ</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <span>ข้าพเจ้า</span>   <?= $form->field($model, 'gender')->label(false)->inline()->radioList(PermitApp::itemAlias('sex')) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'placeholder' => 'ชื่อ - นามสกุล']) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <?=
                    $form->field($model, 'passport')->widget(\yii\widgets\MaskedInput::classname(), [
                        'mask' => '99-9999-9999',
                    ])
                    ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <?= $form->field($model, 'province')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <?= $form->field($model, 'country')->textInput() ?>
                </div>
                <div class="col-xs-4">
                    <?=
                    $form->field($model, 'telephone')->widget(\yii\widgets\MaskedInput::classname(), [
                        'mask' => '99-9999-9999',
                    ])
                    ?>
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
                        'name' => 'check_start_date',
                        // 'value' => date('d-M-Y', strtotime('+2 days')),
                        'options' => ['placeholder' => 'วันที่เดินทางออกประเทศ...', 'class' => 'dot-input2'],
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
                            'id' => 'ddl-province-start', 'class' => 'dot-input2'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-xs-4">
                    <?=
                    $form->field($model, 'start_border_point')->widget(\kartik\depdrop\DepDrop::className(), [
                        'options' => ['id' => 'ddl-borderpoint',
                            'class' => 'dot-input2',
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

                </div>
            </div>
            <div class="row">
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
                    <?=
                    $form->field($model, 'out_border_point')->widget(\kartik\depdrop\DepDrop::className(), [
                        'options' => ['id' => 'ddl-borderpoint-out', 'placeholder' => 'ออก ณ ด่านพรมแดน...'],
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
            </div>











            <?php // $form->field($model, 'request_chanel')->textInput() ?>

            <?php // $form->field($model, 'dlt_office')->textInput() ?>

            <?php // $form->field($model, 'dlt_br')->textInput() ?>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">รายละเอียดรถยนต์ที่นำเข้ามาในประเทศ</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                    <?= $form->field($model, 'appearance')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-4">
                    <?= $form->field($model, 'brands')->textInput() ?>
                </div>
                <div class="col-xs-4">
                    <?= $form->field($model, 'models')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <?= $form->field($model, 'weight')->textInput() ?>
                </div>
                <div class="col-xs-4">
                    <?= $form->field($model, 'total_weight')->textInput(['class' => 'dot-input2']) ?>
                </div>
                <div class="col-xs-4">
                    <?= $form->field($model, 'engine_no')->textInput(['class' => 'dot-input2', 'maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'engine_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'seat')->textInput() ?>
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
