<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\PermitApp */

$this->title = 'แบบคำขออนุญาต';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลคำขอ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zform-create">
    <div class="box box-primary">
        <?php echo $model->id;?>
        <?=
                            GridView::widget([
                                'dataProvider' =>$modelsDriver,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                  //  ['class' => 'yii\grid\SerialColumn'],
                                    //'id',
                                    'drivers_title',
                                    'drivers_name',
                                    'drivers_lastname',
                                    'drivers_passport',
                                    'drivers_licence',
                                    // 'appilcant_id',
                                    // 'car_id',
                                    'status',
                                    // 'blacklist_status',
                                    // 'blacklist_date',
                                    // 'comment',
                                    // 'create_at',
                                    // 'create_by',
                                    // 'update_at',
                                    // 'update_by',
                                   // ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title    ?></h3>
        </div>
        <div class="box-body">
            <?=
            $this->render('drivers_form', [
                'model2' => $model,
//                'modelDriver' => $modelDriver,
//                'dataProvider'=>$dataProvider,
            ])
            ?> 
        </div><!-- /.box-body -->
    </div>
</div>

