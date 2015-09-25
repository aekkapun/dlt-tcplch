
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'แบบคำขออนุญาต';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคำขอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="app-car-create">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title ?></h3>
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
