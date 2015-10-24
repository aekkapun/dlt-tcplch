<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\usermanagement\models\UserDlt */

$this->title = $model->name . ' ' . $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'เจ้าหน้าที่กรมการขนส่งทางบก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-dlt-view">
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
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id',
                            [
                                'label' => 'ชื่อ - นามสกุล',
                                'value' => $model->titles->title.' ' . $model->name  . '   ' .  $model->lname,
                            ],
                           // 'off_code',
                            [
                                'label'=>'สำนักงานขนส่งจังหวัด',
                                'attribute'=>'off_code',
                                'value'=> $model->province->PRV_DESC,
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


</div>
