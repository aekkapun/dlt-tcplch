<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\usermanagement\models\UserTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กลุ่มผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-index">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('Create User Type', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'type',
                    'detail',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div><!-- /.box-body -->
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
