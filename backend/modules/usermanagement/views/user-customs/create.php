<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserCustoms */

$this->title = 'เพิ่ม เจ้าหน้าที่กรมศุลกากร';
$this->params['breadcrumbs'][] = ['label' => 'เจ้าหน้าที่กรมศุลกากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-customs-create">

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
                'border_start' => [],
            ])
            ?>

        </div><!-- /.box-body -->
    </div>

</div>
