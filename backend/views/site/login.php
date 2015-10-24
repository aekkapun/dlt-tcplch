<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'An Unauthorized cannot Access.';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row"></div>
    <section class="col-md-4 col-md-offset-4">
        <section class="login-form">
            <div class="panel panel-dlt">
                <div class="panel-heading text-center">An Unauthorized cannot Access.</div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-danger btn-block', 'name' => 'login-button']) ?>
                        <?= Html::resetButton('Login', ['class' => 'btn btn-lg btn-danger btn-block', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </section>
    </section>
</div>
