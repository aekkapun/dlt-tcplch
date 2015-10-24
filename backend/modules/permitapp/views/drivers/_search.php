<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\DriversSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drivers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'drivers_gender') ?>

    <?= $form->field($model, 'drivers_name') ?>

    <?= $form->field($model, 'drivers_lastname') ?>

    <?= $form->field($model, 'drivers_passport') ?>

    <?php // echo $form->field($model, 'drivers_licence') ?>

    <?php // echo $form->field($model, 'appilcant_id') ?>

    <?php // echo $form->field($model, 'car_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'blacklist_status') ?>

    <?php // echo $form->field($model, 'blacklist_date') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
