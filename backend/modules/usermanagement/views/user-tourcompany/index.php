
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\usermanagement\models\UserDltSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้งาน บริษัทธุรกิจการท่องเที่ยว';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title     ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('เพิ่ม ', ['create'], ['class' => 'btn btn-success  pull-right glyphicon glyphicon-plus']) ?>
        </p>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'license_no',
            'trader_name',
            [
                'header'=>'ชื่อบริษัท ภาษาอังกฤษ',
                'attribute'=>trader_name_en,
                'value'=>function($model){
                    return $model->trader_name_en;
                }
            ],
            //'trader_name_en',
           // 'trader_category',
            // 'effective_date',
            // 'expire_date',
            // 'address',
            // 'mobile_no',
            // 'telephone',
                 'email:email',
            // 'user_id',
            // 'province',
            // 'amphur',
            // 'zipcode',

            [
              'class' => 'yii\grid\ActionColumn',
              'options'=>['style'=>'width:120px;'],
              'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
           ],
        ],
    ]); ?>

    </div><!-- /.box-body -->
</div>