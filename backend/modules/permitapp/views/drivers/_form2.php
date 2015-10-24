<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\permitapp\models\AppCar;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="drivers-form">

    <?php
    $form = ActiveForm::begin(['id' => $model->formName(), 'options' => [
                    'class' => 'inline',
                    'enctype' => 'multipart/form-data'
                ],]);
    $x = Yii::$app->getRequest()->getQueryParam('id')
    ?>
    <?= $form->errorSummary($model); ?>
<?= $form->field($model, 'ref')->textInput()->label(false); ?>
    <div class="row">
        <div class="col-md-4">

<?= $form->field($model, 'drivers_title')->label('คำนำหน้า')->dropDownList(AppCar::itemAlias('prefixs')) ?>
        </div>
        <div class="col-md-4">
<?= $form->field($model, 'drivers_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
<?= $form->field($model, 'drivers_lastname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'drivers_passport')->textInput(['maxlength' => true]) ?></div> 
        <div class="col-md-4"> <?= $form->field($model, 'drivers_licence')->textInput(['maxlength' => true]) ?></div>
    </div>    
    <div class="row">
        <div class=" col-md-2">แนบหลักฐาน</div>
        <div class=" col-md-10">
            <?=
            $form->field($model, 'docs[]')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'initialPreview' => $model->initialPreview($model->docs, 'docs', 'file'),
                    'initialPreviewConfig' => $model->initialPreview($model->docs, 'docs', 'config'),
                    'allowedFileExtensions' => ['pdf', 'jpg'],
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


<?= $form->field($model, 'appilcant_id')->textInput(['maxlength' => true, 'value' => $x])->label(false) ?>

    <div class="row">
        <div class="col-md-6 col-xs-6">
<?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูล' : 'อัพเดทข้อมูล', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
        </div> 
        <div class="col-md-6 col-xs-6">
<?= Html::resetButton($model->isNewRecord ? '<i class="glyphicon glyphicon-refresh"></i> เคลียร์ข้อมูล' : 'คืนค่าเดิม', ['class' => ($model->isNewRecord ? 'btn btn-danger' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
        </div> 
    </div>
</div>
    <?php ActiveForm::end(); ?>
    <?php
    $script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e) 
{
   var \$form = $(this);
    $.post(
        \$form.attr("action"), // serialize Yii2 form
        \$form.serialize()
    )
        .done(function(result) {
        if(result == 1)
        {
            $(\$form).trigger("reset");
            $.pjax.reload({container:'#branchesGrid'});
        }else
        {        
            $("#message").html(result);
        }
        }).fail(function() 
        {
            console.log("server error");
        });
    return false;
});

JS;
    $this->registerJs($script);
    ?>
