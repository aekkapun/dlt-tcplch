<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\configuration\models\Customsoffice */

$this->title = 'Create Customsoffice';
$this->params['breadcrumbs'][] = ['label' => 'Customsoffices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customsoffice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
