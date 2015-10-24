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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'drivers_title',
            'drivers_name',
            'drivers_lastname',
            'drivers_passport',
            'drivers_licence',
//            'appilcant_id',
//            'docs',
//            'status',
//            'blacklist_status',
//            'blacklist_date',
//            'comment',
//            'create_at',
//            'create_by',
//            'update_at',
//            'update_by',
//            'ref'
        ],
    ]) ?>

</div>
