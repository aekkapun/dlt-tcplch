<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\configuration\models\BorderCheckpointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลด่านพรมแดน';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="border-checkpoint-index">
    <div class="col-xs-12" style="padding-top: 10px;">
        <div class="box">
            <div class="box-header">
                <p>
                    <?= Html::a('เพิ่ม ด่านพรมแดน', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                </p>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="state-index">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'border_province',
                            'border_thai',
                            'border_other',
                            'border_land',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>



</div>
