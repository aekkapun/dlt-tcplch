<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'แก้ไขโปรไฟล์';
$this->params['breadcrumbs'][] = ['label' => 'โปรไฟล์', 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไขโปรไฟล์');
?>

<div class="user-update">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tachometer"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'modelUser'=>$modelUser
            ])
            ?>
        </div>
    </div>
</div>
