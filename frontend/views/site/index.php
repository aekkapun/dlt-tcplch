<?php
/* @var $this yii\web\View */

use yii\bootstrap\Carousel;

$this->title = 'รถมาใช้ในราชอาณาจักรเป็นการชั่วคราวเพื่อใช้ในการท่องเที่ยว';
?>
<div class="site-index ">
<div>
    <?php
    echo Carousel::widget([
        'items' => [
            '<img src="images/slide/1.jpg"/>',
            ['content' => '<img src="images/slide/2.jpg"/>'],
            [
                'content' => '<img src="images/slide/3.jpg"/>',
                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
            ],
            ['content' => '<img src="images/slide/4.jpg"/>'],
            ['content' => '<img src="images/slide/5.jpg"/>'],
        ]
    ]);
    ?>

</div>
    <div class="jumbotron">
        <h1>Chinese Car Tour Permission!</h1><hr/>

        <p class="lead">ระบบ รถมาใช้ในราชอาณาจักรเป็นการชั่วคราวเพื่อใช้ในการท่องเที่ยว.</p>

        <p><a class="btn btn-lg btn-dlt" href="#">Get Develop with Yii</a></p>
    </div>

    <div class="body-content">
        
        <div class="row">

        </div>

    </div>
</div>

