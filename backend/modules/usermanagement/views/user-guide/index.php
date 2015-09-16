<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\guide\models\TourCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพิ่มผู้ใช้งานบริษัท';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-company-index">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('เพิ่ม user บริษัท', ['create'], ['class' => 'btn btn-success pull-right']) ?>
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
                    'trader_name_en',
                    //'category',
                    // 'effective_date',
                    // 'expire_date',
                    // 'address',
                    // 'province',
                    // 'amphur',
                    // 'district',
                    // 'zipcode',
                    // 'mobile_no',
                    // 'telephone',
                    // 'email:email',
                    // 'created_at',
                    // 'updated_at',
                    // 'created_by',
                    // 'updated_by',
                    // 'status',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{createuser} {view} ',
                        'buttons' => [
                            'createuser' => function ($url, $model, $key) {
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
