<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'แบบคำขออนุญาต';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคำขอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permit-app-create  panel panel-dlt">
    <div class="panel-heading">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="panel-body">
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>  
    </div>
</div>

