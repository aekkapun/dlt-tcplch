<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserDlt */
$this->title = 'ผู้ใช้งาน :'. $model->trader_name;
//$this->title = 'User Management ' . $model->trader_name;
$this->params['breadcrumbs'][] = ['label' => 'บริษัทธุรกิจการท่องเที่ยว', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trader_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'อัพเดท';
?>
<div class="user-dlt-update">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title   ?></h3>
        </div>
        <div class="box-body">
            <h1><?php // Html::encode($this->title)  ?></h1>

            <?=
            $this->render('_form', [
                'model' => $model,
                'modelUser' => $modelUser,
            ])
            ?>

        </div><!-- /.box-body -->
    </div>
</div>