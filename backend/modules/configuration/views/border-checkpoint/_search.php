<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\BorderCheckpointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="border-checkpoint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'border_province') ?>

    <?= $form->field($model, 'border_thai') ?>

    <?= $form->field($model, 'border_other') ?>

    <?= $form->field($model, 'border_land') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
