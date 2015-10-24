<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserTourcompany */

$this->title = $model->trader_name;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน บริษัทนำเที่ยว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-info-circle"></i>
                <?php // $this->title         ?></h3>
        </div>
        <div class="box-body">
            <h1><?php Html::encode($this->title) ?></h1>
            <p>
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
            <div class="panel panel-dlt">
                <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
                <div class="panel-body">
                     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'license_no',
            [
                'label'=>'ชื่อบริษัท',
                'value' => $model->trader_name.' ' .'EN : '. $model->trader_name_en,
            ],
           // 'trader_category',
            [
                'label'=>'วันที่อนุญาต',
                'value'=>$model->effective_date . ' - วันที่หมดอายุ  ' .  $model->expire_date,
            ],
//            'effective_date',
//            'expire_date',
            [
                'label'=>'ที่อยู่',
                'value'=>$model->address. '  รหัสไปรษณีย์   :  '.$model->zipcode,
            ],
            [
                'label'=>'โทรศัพท์',
                'value'=>$model->telephone.' - มือถือ '.$model->mobile_no,
            ],
//            'mobile_no',
//            'telephone',
            'email:email',
            //'user_id',
            //'province',
            //'amphur',
            'zipcode',
        ],
    ]) ?>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $modelUser,
                        'attributes' => [
                            [
                                'label' => 'username',
                                'value' => $modelUser->username,
                            ],
                            [
                                'label' => 'permission',
                                'value' => $modelUser->userGroup->type,
                            ],
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>