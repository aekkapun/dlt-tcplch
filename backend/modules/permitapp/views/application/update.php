<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'อัพเดท: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Permit Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="permit-app-update">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title   ?></h3>
        </div>
        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?> 
        </div><!-- /.box-body -->
    </div>
</div>
