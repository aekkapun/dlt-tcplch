<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\permitapp\models\Freelance */

$this->title = 'Create Freelance';
$this->params['breadcrumbs'][] = ['label' => 'Freelances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'border_start' => $border_start,
        'border_out' => $border_out,
    ])
    ?>

</div>
