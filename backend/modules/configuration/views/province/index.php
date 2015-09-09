<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\configuration\models\ProvinceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการจังหวัด';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-index">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> รายการจังหวัด</h3>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('เพิ่มจังหวัด', ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'PRV_CODE',
                    'PRV_DESC',
                    'PRV_ABREV',
                    'PRV_ENG_DESC',
                    // 'PRV_ABREV_ENG',
                    // 'UPD_USER_CODE',
                    // 'LAST_UPD_DATE',
                    // 'CREATE_USER_CODE',
                    // 'CREATE_DATE',
                    // 'REGION_CODE',
                    // 'OLD_REGION_CODE',
                    // 'TRS_JOB_CODE',
                    // 'PRV_CODE_INSURE',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>





</div>
