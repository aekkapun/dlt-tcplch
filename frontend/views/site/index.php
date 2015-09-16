<?php
/* @var $this yii\web\View */

use yii\bootstrap\Carousel;

$this->title = 'รถมาใช้ในราชอาณาจักรเป็นการชั่วคราวเพื่อใช้ในการท่องเที่ยว';
?>
<div>
    <div class="wrap">
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
            ],
        ]);
        ?>

    </div>
    <div class="body-content">
        <div class="row">       
            <?php
            echo date('01/m/Y'); // 01.11.2014
            echo ' - ';
            echo date('t/m/Y');  // 30.11.2014
            ?>
            <hr/>
        </div>
        <!-- Page Features -->
        <div class="row">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>

</div>

