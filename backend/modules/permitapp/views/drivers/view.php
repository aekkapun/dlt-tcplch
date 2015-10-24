<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-view">

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
            'drivers_title',
            'drivers_name',
            'drivers_lastname',
            'drivers_passport',
            'drivers_licence',
            'appilcant_id',
            'docs',
            'status',
            'blacklist_status',
            'blacklist_date',
            'comment',
            'create_at',
            'create_by',
            'update_at',
            'update_by',
            'ref'
        ],
    ]) ?>

</div>
