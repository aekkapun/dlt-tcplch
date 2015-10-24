<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\FreelanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freelance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'car_enroll_country') ?>

    <?php // echo $form->field($model, 'plates_number') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'start_province') ?>

    <?php // echo $form->field($model, 'start_border_point') ?>

    <?php // echo $form->field($model, 'target_province') ?>

    <?php // echo $form->field($model, 'out_province') ?>

    <?php // echo $form->field($model, 'out_border_point') ?>

    <?php // echo $form->field($model, 'request_chanel') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'cretaed_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'approve_status') ?>

    <?php // echo $form->field($model, 'approve_by') ?>

    <?php // echo $form->field($model, 'approve_date') ?>

    <?php // echo $form->field($model, 'approve_comment') ?>

    <?php // echo $form->field($model, 'dlt_office') ?>

    <?php // echo $form->field($model, 'dlt_br') ?>

    <?php // echo $form->field($model, 'appearance') ?>

    <?php // echo $form->field($model, 'brands') ?>

    <?php // echo $form->field($model, 'models') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'total_weight') ?>

    <?php // echo $form->field($model, 'engine_no') ?>

    <?php // echo $form->field($model, 'seat') ?>

    <?php // echo $form->field($model, 'car_type') ?>

    <?php // echo $form->field($model, 'owner_type') ?>

    <?php // echo $form->field($model, 'car_color') ?>

    <?php // echo $form->field($model, 'carbody_no') ?>

    <?php // echo $form->field($model, 'ref') ?>

    <?php // echo $form->field($model, 'docs') ?>

    <?php // echo $form->field($model, 'operate_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
