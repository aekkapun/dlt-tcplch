<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\permitapp\models\AppCar;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drivers-form">

    <?php
    $form = ActiveForm::begin(['id' => $model->formName(), 'options' => [
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ],]);
    $x = Yii::$app->getRequest()->getQueryParam('id')
    ?>
            <?= $form->errorSummary($model); ?>
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
        <div class="col-md-4"> <?= $form->field($model, 'docs')->textInput() ?></div>
    </div>
<?= $form->field($model, 'appilcant_id')->hiddenInput(['maxlength' => true,'value'=>$x])->label(false) ?>

    <div class="row">
        <div class="col-md-6 col-xs-6">
            <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูล' : 'อัพเดทข้อมูล', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
        </div> 
        <div class="col-md-6 col-xs-6">
    <?= Html::resetButton($model->isNewRecord ? '<i class="glyphicon glyphicon-refresh"></i> เคลียร์ข้อมูล' : 'คืนค่าเดิม', ['class' => ($model->isNewRecord ? 'btn btn-danger' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
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
