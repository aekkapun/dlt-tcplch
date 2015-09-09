<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\BorderCheckpoint */

$this->title = 'ด่านพรมแดน';
$this->params['breadcrumbs'][] = ['label' => 'ด่านพรมแดน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="border-checkpoint-create">
    <div class="col-xs-12" style="padding-top: 10px;">
        <div class="box">
            <div class="box-header">
                <p>
                    <?= Html::encode($this->title) ?> <?= Html::a('เพิ่ม ด่านพรมแดน', ['create'], ['class' => 'btn btn-success pull-right']) ?>
                </p>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>
            </div>
        </div>
    </div>

<?php // echo $this->render('_search', ['model' => $searchModel]);   ?>




</div>
