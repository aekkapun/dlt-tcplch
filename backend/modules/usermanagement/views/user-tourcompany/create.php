<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserTourcompany */

$this->title = 'สร้างผู้ใช้งาน บริษัทธุรกิจท่องเที่ยว';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ บริษัทธุรกิจท่องเที่ยว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tourcompany-create">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php  $this->title    ?></h3>
        </div>
        <div class="box-body">
            <h1><?php // Html::encode($this->title)   ?></h1>

            <?=
            $this->render('_form', [
                'model' => $model,
                'modelUser' => $modelUser,
            ])
            ?>

        </div><!-- /.box-body -->
    </div>
</div>
