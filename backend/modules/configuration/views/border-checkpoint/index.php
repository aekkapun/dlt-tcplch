<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\modules\configuration\models\Province;
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
                            //'id',
                            [
                                'attribute' => 'border_province',
                                'header' => 'ด่านจังหวัด',
                                'width' => '250px',
                                'value' => function ($model, $key, $index, $widget) {
                                    return $model->province->PRV_DESC;
                                },
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => ArrayHelper::map(Province::find()->where(['BOR_FLAG'=>1])->orderBy('PRV_DESC')->asArray()->all(), 'PRV_CODE', 'PRV_DESC'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'กรองตามจังหวัด'],
                                'group' => true, // enable grouping
                            ],
//                            [
//                                'attribute' => 'border_province',
//                                'header' => 'ด่านจังหวัด',
//                                'value' => function ($model) {
//                                    return $model->province->PRV_DESC;
//                                }
//                            ],
                            'border_thai',
                            'border_other',
                            //'border_land',
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
