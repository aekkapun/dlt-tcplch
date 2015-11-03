<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */

$this->title = 'อัพเดทข้อมูล: ' . ' ' . $model->drivers_name.'-'.$model->drivers_lastname;
$this->params['breadcrumbs'][] = ['label' => 'รายการคนขับรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drivers-update">


        <div class="box-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?> 
        </div><!-- /.box-body -->

</div>
