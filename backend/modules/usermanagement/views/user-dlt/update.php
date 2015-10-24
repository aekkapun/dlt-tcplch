<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserDlt */

$this->title = 'User Management ' . $model->name . ' ' . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'เจ้าหน้าที่กรมการขนส่งทางบก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name.' '.$model->lname, 'url' => ['view', 'id' => $model->id]];
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
