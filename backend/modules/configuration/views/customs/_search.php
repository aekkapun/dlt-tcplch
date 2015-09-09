<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\CustomsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customs_office_id') ?>

    <?= $form->field($model, 'customs_name') ?>

    <?= $form->field($model, 'customs_prv') ?>

    <?= $form->field($model, 'customs_amp') ?>

    <?php // echo $form->field($model, 'customs_zipcode') ?>

    <?php // echo $form->field($model, 'customs_tel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
