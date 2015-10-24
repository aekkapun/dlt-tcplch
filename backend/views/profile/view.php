<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'โปรไฟล์';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dlt-default-index">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tachometer"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <div class="user-view">

                <p class="pull-right">
                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> ' . Yii::t('app', 'อัพเดท'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-md']) ?>

                </p>

                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [

                        'username',
                        'email:email',
                        [
                            'format' => 'html',
                            'label' => 'สถานะ',
                            'value' => $model->is_block == 0 ? '<span class="btn btn-success">เปิดใช้งาน</span>' : '<span class="btn btn-danger">ระงับใช้งาน</span>'
                        ],
                        [
                            'label' => 'กลุ่มผู้ใช้งาน',
                            'value' => $model->userGroup->type,
                        ]
                    ],
                ])
                ?>

            </div>
            <div class="panel panel-dlt">
                <div class="panel-heading">ข้อมูลผู้ใช้งาน</div>
                <div class="panel-body">
                    <?=
                    DetailView::widget([
                        'model' => $modelUser,
                        'attributes' => [
                            // 'id',
                            [
                                'label' => 'ชื่อ - นามสกุล',
                                'value' => $modelUser->titles->title . ' ' . $modelUser->name . '   ' . $modelUser->lname,
                            ],
                            // 'off_code',
                            [
                                'label' => 'สำนักงานขนส่งจังหวัด',
                                'attribute' => 'off_code',
                                'value' => $modelUser->province->PRV_DESC,
                            ],
                            'br_code',
                            //'emp_id',
                            'id_no',
                        //'org_code',
                        //'user_id',
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>
</div>