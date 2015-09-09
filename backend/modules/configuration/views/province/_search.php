<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\ProvinceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'PRV_CODE') ?>

    <?= $form->field($model, 'PRV_DESC') ?>

    <?= $form->field($model, 'PRV_ABREV') ?>

    <?= $form->field($model, 'PRV_ENG_DESC') ?>

    <?php // echo $form->field($model, 'PRV_ABREV_ENG') ?>

    <?php // echo $form->field($model, 'UPD_USER_CODE') ?>

    <?php // echo $form->field($model, 'LAST_UPD_DATE') ?>

    <?php // echo $form->field($model, 'CREATE_USER_CODE') ?>

    <?php // echo $form->field($model, 'CREATE_DATE') ?>

    <?php // echo $form->field($model, 'REGION_CODE') ?>

    <?php // echo $form->field($model, 'OLD_REGION_CODE') ?>

    <?php // echo $form->field($model, 'TRS_JOB_CODE') ?>

    <?php // echo $form->field($model, 'PRV_CODE_INSURE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
