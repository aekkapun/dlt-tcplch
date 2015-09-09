<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\configuration\models\CustomsofficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สำนักงานด่านศุลกากร';
$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customsoffice-index">

    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="col-xs-12" style="padding-top: 10px;">
        <div class="box">
            <div class="box-header">
                <p>
                    <?= Html::a('เพิ่ม สำนักงานใหญ่', ['create'], ['class' => 'btn btn-success pull-right']) ?>
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
                            'id',
                            'customs_officec',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>



</div>
