<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\usermanagement\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> <?= $this->title ?></h3>
        </div>
        <div class="box-body">
            <p>
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'username',
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    'email:email',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    'is_block',
                    [
                        'attribute' => 'user_type',
                        'value' => function($model) {
                            return $model->userType->type;
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                    ],
                ],
            ]);
            ?>
        </div><!-- /.box-body -->
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>



</div>
