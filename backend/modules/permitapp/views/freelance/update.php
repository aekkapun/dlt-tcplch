<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Zform */

$this->title = 'อัพเดท คำขอ #: ' . ' ' . $model->id . 'ผู้ขออนุญาต -' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'รายการที่ขออนุญาต', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zform-update">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title   ?></h3>
        </div>
        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                'border_start' => $border_start,
                'border_out' => $border_out,
            ])
            ?> 
        </div><!-- /.box-body -->
    </div>
</div>
