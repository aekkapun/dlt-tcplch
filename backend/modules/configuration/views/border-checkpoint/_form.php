<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\configuration\models\Province;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\BorderCheckpoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="border-checkpoint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'border_province')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Province::find()->where(['BOR_FLAG'=>1])->all(), 'PRV_CODE', 'PRV_DESC'),
        'options' => ['placeholder' => ' ด่านจังหวัด ...',
            'id' => 'ddl-cat'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'border_thai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'border_other')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'border_land')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
