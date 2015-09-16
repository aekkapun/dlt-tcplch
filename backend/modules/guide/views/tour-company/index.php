<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\guide\models\TourCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลบริษัทนำเที่ยว/มัคคุเทศก์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-company-index">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tachometer"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Tour Company', ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'license_no',
                    'trader_name',
                    //'trader_name_en',
                    'category',
                    // 'effective_date',
                    'expire_date',
                    // 'address',
//            [
//                'attribute' => 'category_id',
//                'value' => function ($model) {
//                    return empty($model->category_id) ? '-' : $model->category->title;
//                },
//            ],
                    // 'province',
                    // 'amphur',
                    // 'district',
                    // 'zipcode',
                    //'mobile_no',
                    // 'telephone',
                    'email:email',
                    // 'created_at',
                    // 'updated_at',
                    // 'created_by',
                    // 'updated_by',
                    // 'status',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{create} {view} {update} {delete}',
                        'buttons' => [
                            'create' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', $url);
                            }
                        ],
                    ],
                ],
            ]);
            ?>
        </div><!-- /.box-body -->
    </div>

</div>
