<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\configuration\models\Province;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\usermanagement\models\UserCustomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เจ้าหน้าที่กรมศุลกากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title        ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('เพิ่ม ', ['create'], ['class' => 'btn btn-success  pull-right glyphicon glyphicon-plus']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'title',
                    'header' => 'คำนำหน้า',
                    'value' => function ($model) {
                        return $model->titles->title;
                    }
                ],
                //'title',
                'name',
                'lname',
                //'off_code',
                [
                    'attribute' => 'off_code',
                    'header' => 'สำนักงานศุลกากร.',
                    'value' => function ($model) {
                        return $model->province->PRV_DESC;
                    }
                ],
                [
                    'attribute' => 'br_code',
                    'header' => 'ด่านศุลกากร.',
                    'value' => function ($model) {
                        return $model->borderPoint->border_thai;
                    }
                ],
                // 'br_code',
                // 'emp_id',
                // 'id_no',
                // 'org_code',
                [
                    'attribute' => 'user_id',
                    'value' => function($model) {
                        return $model->user->username;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'options' => ['style' => 'width:120px;'],
                    'buttonOptions' => ['class' => 'btn btn-default'],
                    'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
                ],
            ],
        ]);
        ?>

    </div><!-- /.box-body -->
</div>
