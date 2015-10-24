<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-news-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <?= $form->errorSummary($model); ?>
        <div class="col-md-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'thump')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'short')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'views')->textInput() ?>
        </div>
        <div class="col-md-3">
             <?= $form->field($model, 'status')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><?= $form->field($model, 'content')->textarea(['rows' => 6]) ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
