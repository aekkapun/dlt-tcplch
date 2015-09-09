<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\Province */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PRV_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRV_DESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRV_ABREV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRV_ENG_DESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRV_ABREV_ENG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPD_USER_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAST_UPD_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_USER_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_DATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REGION_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OLD_REGION_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TRS_JOB_CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRV_CODE_INSURE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
