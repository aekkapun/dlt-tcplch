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
use backend\modules\permitapp\models\AppCar;
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
            <div class="row ">
                <div class="col-md-1"></div>
                <div class="col-md-4 col-xs-4  divbox-dlt">
                    <span>ประเภทรถ</span><?= $form->field($model, 'car_type')->inline()->label(false)->radioList(AppCar::itemAlias('cartype')) ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 col-xs-4 divbox-dlt">
                    <span>ผู้ขออนุญาต</span><?= $form->field($model, 'owner_type')->inline()->label(false)->radioList(AppCar::itemAlias('ownertype')) ?>
                </div>
            </div><hr/>
            <div class="row">
                <div class="col-md-2 col-xs-2">
                    <span>คำนำหน้า</span>   <?= $form->field($model, 'gender')->label(false)->dropDownList(AppCar::itemAlias('prefixs')) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <span>ข้าพเจ้า </span><?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'placeholder' => 'ชื่อ - นามสกุล'])->label(false) ?>
                </div>
                <div class="col-md-2 col-xs-2">
                    <span>อายุ</span><?= $form->field($model, 'age')->textInput(['maxlength' => true, 'placeholder' => '0'])->label(false) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <span>เลขที่หนังสือหนังสือเดินทาง</span><?=
                    $form->field($model, 'passport')->widget(\yii\widgets\MaskedInput::classname(), [
                        'mask' => '99-9999-9999',
                    ])->label(false)
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <span>อยู่บ้านเลขที่ </span><?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'ซอย , ถนน  แขวง  เขต '])->label(false) ?>
                </div>
                <div class="col-md-3 col-xs-3">
                    <span>จังหวัด</span><?= $form->field($model, 'province')->textInput(['placeholder' => 'จังหวัด'])->label(false) ?>
                </div>
                <div class="col-md-3 col-xs-3">
                    <span>ประเทศ</span><?= $form->field($model, 'country')->textInput(['placeholder' => 'ประเทศ'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <span>โทรศัพท์</span><?=
                    $form->field($model, 'telephone')->widget(\yii\widgets\MaskedInput::classname(), [
                        'mask' => '99-9999-9999',
                    ])->label(false)
                    ?>
                </div>
                <div class="col-md-4 col-xs-4"><span>มีความประสงค์ขออนุญาตนำรถที่จดทะเบียนในประเทศ</span>
                    <?= $form->field($model, 'car_enroll_country')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-4 col-xs-4"><span>หมายเลขทะเบียน</span>
                    <?= $form->field($model, 'plates_number')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6"><span>เข้ามาในราชอาณาจักรเป็นการชั่วคราวเพื่อใช้ในการท่องเที่ยว  ตั้งแต่วันที่ </span>
                    <?=
                    $form->field($model, 'start_date')->label(false)->widget(DatePicker::ClassName(), [
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
                <div class="col-xs-4"><span>ถึงวันที่</span>
                    <?=
                    $form->field($model, 'end_date')->widget(DatePicker::ClassName(), [
                        'name' => 'check_start_date',
                        // 'value' => date('d-M-Y', strtotime('+2 days')),
                        'options' => ['placeholder' => 'วันที่เดินทางออกประเทศ...'],
                        'pluginOptions' => [
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true
                        ]
                    ])->label(false);
                    ?>
                </div>
                <div class="col-xs-4"><span>ต้นทางที่จังหวัด</span>
                    <?=
                    $form->field($model, 'start_province')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG' => 1])->all(), 'PRV_CODE', 'PRV_DESC'),
                        'options' => ['placeholder' => 'เลือกจังหวัด ...',
                            'id' => 'ddl-province-start',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);
                    ?>
                </div>
                <div class="col-xs-4"><span>ด่านพรมแดน</span>
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
                    ])->label(false)
                    ?>
                </div>
                <div class="col-xs-4"><span>ไปยังปลายทางที่จังหวัด</span>
                    <?=
                    $form->field($model, 'target_province')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Province::find()->all(), 'PRV_CODE', 'PRV_DESC'),
                        'options' => ['placeholder' => 'เลือกจังหวัด ...',
                            'id' => 'target-province'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);
                    ?>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-4"><span>ออกจากประเทศไทยที่จังหวัด</span>
                    <?=
                    $form->field($model, 'out_province')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG' => 1])->all(), 'PRV_CODE', 'PRV_DESC'),
                        'options' => ['placeholder' => 'เลือกจังหวัด ...',
                            'id' => 'ddl-province-out'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label(false);
                    ?>
                </div>
                <div class="col-xs-4"><span>ด่านพรมแดน</span>
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
                    ])->label(false)
                    ?>
                </div>
            </div>

            <?php // $form->field($model, 'request_chanel')->textInput() ?>

            <?php // $form->field($model, 'dlt_office')->textInput() ?>

            <?php // $form->field($model, 'dlt_br')->textInput() ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-bus"></i> รายละเอียดรถยนต์ที่นำเข้ามาในประเทศ</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4"><span>ลักษณะรถ</span>
                    <?= $form->field($model, 'appearance')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-xs-4"><span>ยี่ห้อรถ</span>
                    <?= $form->field($model, 'brands')->textInput()->label(false) ?>
                </div>
                <div class="col-xs-4"><span>แบบรถ</span>
                    <?= $form->field($model, 'models')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4"><span>สีรถ</span>
                    <?= $form->field($model, 'car_color')->textInput()->label(false) ?>
                </div>
                <div class="col-xs-4"><span>น้ำหนักรถ</span>
                    <?= $form->field($model, 'weight')->textInput()->label(false) ?>
                </div>
                <div class="col-xs-4"><span>น้ำหนักรถ</span>
                    <?= $form->field($model, 'total_weight')->textInput()->label(false) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-4"><span>เลขตัวรถ</span>
                    <?= $form->field($model, 'carbody_no')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-4"><span>เลขเครื่องยนต์</span>
                    <?= $form->field($model, 'engine_no')->textInput(['maxlength' => true])->label(false) ?>
                </div>
                <div class="col-md-4"><span>ที่นั่ง</span>
                    <?= $form->field($model, 'seat')->textInput()->label(false) ?>
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
