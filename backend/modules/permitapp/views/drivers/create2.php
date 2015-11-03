<?php

use yii\helpers\Html;
$request = Yii::$app->request;
$get = $request->get();
$id = $request->get('id');
/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'เพิ่มข้อมูล ผู้ขับรถ';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคำขอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zform-create">
        <div class="box-body">
            <?=
            $this->render('_form2', [
                'model' => $model,
            ])
            ?> 
        </div><!-- /.box-body -->
</div>

