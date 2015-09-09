<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\grid\DataColumn;
use kartik\grid\FormulaColumn;

use backend\modules\configuration\models\Customsoffice;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\configuration\models\CustomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ด่านศุลกากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customs-index">

    <div class="box">
        <div class="box-header">
            <p>
                <?= Html::a('เพิ่ม ด่านศุลกากร', ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </p>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="state-index">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'],
                        [
                            'attribute' => 'customs_office_id',
                            'width' => '150px',
                            'value' => function ($model, $key, $index, $widget) {
                                return $model->customsOffice->customs_officec;
                            },
//            'value'=>'cat.vices_name',
                            'filterType' => GridView::FILTER_SELECT2,
                            'filter' => ArrayHelper::map(Customsoffice::find()->orderBy('id')->asArray()->all(), 'id', 'customs_officec'),
                            'filterWidgetOptions' => [
                                'pluginOptions' => ['allowClear' => true],
                            ],
                            'filterInputOptions' => ['placeholder' => 'สำนักงาน'],
                            'group' => true, // enable grouping
                        ],
                        'customs_name',
                        'customs_prv',
                        'customs_amp',
                        //'customs_zipcode',
                       // 'customs_tel',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>


</div>


