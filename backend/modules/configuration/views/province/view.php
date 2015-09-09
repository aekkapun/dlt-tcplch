<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\Province */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'PRV_CODE',
            'PRV_DESC',
            'PRV_ABREV',
            'PRV_ENG_DESC',
            'PRV_ABREV_ENG',
            'UPD_USER_CODE',
            'LAST_UPD_DATE',
            'CREATE_USER_CODE',
            'CREATE_DATE',
            'REGION_CODE',
            'OLD_REGION_CODE',
            'TRS_JOB_CODE',
            'PRV_CODE_INSURE',
        ],
    ]) ?>

</div>
