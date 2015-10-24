<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'แบบคำขออนุญาต';
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

