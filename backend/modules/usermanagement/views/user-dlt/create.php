<?php

use yii\helpers\Html;
use backend\modules\permitapp\models\AppCar;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserDlt */

$this->title = 'สร้างผู้ใช้งาน เจ้าหน้าที่กรมการขนส่งทางบก';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ ผู้ใช้งานเจ้าหน้าที่กรมการขนส่งทางบก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-dlt-create">
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

