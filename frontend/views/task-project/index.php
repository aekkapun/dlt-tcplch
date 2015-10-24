<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TaskProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'title',
//            [
//                'format' => 'html',
//                'headerOptions' => ['width' => '250'],
//                'value' => function ($model) {
//            return '<div class="progress">
//                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="min-width: 5em; width: ' . $model->progress . '%;">
//                      ' . $model->progress . '%
//                    </div>
//                  </div>'
//            ;
//        }
//            ],
            [
                'attribute' => 'progress',
                'format' => 'html',
                'headerOptions' => ['width' => '250'],
                'value' => function($model) {
                    if ($model->progress >= 80) {
                        return '
                        <div class="progress">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" style="width:' . $model->progress . '%">
                            ' . $model->progress . '% Complete (success)
                          </div>
                        </div>
                   '
                        ;
                    }elseif ($model->progress >= 70) {
                        return '
                        <div class="progress">
                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" style="width:' . $model->progress . '%">
                            ' . $model->progress . '% Complete (success)
                          </div>
                        </div>
                   ';
                    }
                    elseif ($model->progress >= 50) {
                        return '
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" style="width:' . $model->progress . '%">
                            ' . $model->progress . '% Complete (success)
                          </div>
                        </div>
                   ';
                    } else {
                        return '
                        <div class="progress">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" style="width:' . $model->progress . '%">
                            ' . $model->progress . '% Complete (success)
                          </div>
                        </div>
                   ';
                    }
                },
            ],
        // 'progress',
        //'parent',
        //'detail:ntext',
        // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
