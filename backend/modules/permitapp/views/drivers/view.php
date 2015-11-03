<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Drivers */

$this->title = 'ข้อมูลคนขับ ' . $model->drivers_name . '-' . $model->drivers_lastname;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <p class="pull-right">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
    </div>
    <div class="box-body">


        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                //'drivers_title',
                [
                    'label'=>'คำนำหน้า',
                    'attribute' => 'drivers_title',
                    'value' => $model->getTitle($model->drivers_title),
                ],
                'drivers_name',
                'drivers_lastname',
                'drivers_passport',
                'drivers_licence',
                //'appilcant_id',
                'docs',
                [
                    'format' => 'html',
                    'label' => 'status',
                    'value' => $model->status == 2 ? '<p><span class="label label-danger">Unactive</span></p>' :
                            '<p><span class="label label-success">Aariable</span></p>'
                ],
               // 'status',
            // 'blacklist_status',
            // 'blacklist_date',
            // 'comment',
            // 'create_at',
            //  'create_by',
            // 'update_at',
            //'update_by',
            //'ref'
            ],
        ])
        ?>

    </div><!-- /.box-body -->
</div>


