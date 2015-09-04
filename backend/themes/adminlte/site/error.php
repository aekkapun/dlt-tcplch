<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<!-- Main content -->
<section class="content">
    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="text-danger"><?= nl2br(Html::encode($message)) ?></p>
        <p><a class="btn btn-default btn-lg" href="#" role="button">Learn more</a></p>
    </div>
</section>
