<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\Customs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'customs_office_id')->textInput() ?>

    <?= $form->field($model, 'customs_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customs_prv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customs_amp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customs_zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customs_tel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
