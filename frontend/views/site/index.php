<?php
/* @var $this yii\web\View */

use yii\bootstrap\Carousel;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'รถมาใช้ในราชอาณาจักรเป็นการชั่วคราวเพื่อใช้ในการท่องเที่ยว';
?>
<div>
    <div class="wrap" style="background-color: #ff;">
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
    <div class="jumbotronx">
        <h1 class="text-center">ระบบการอนุญาตและออกเครื่องหมายแสดงการใช้รถที่นำเข้ามาในราชอาณาจักรเป็นการชั่วคราว
            <?= Html::a('ยื่นขอขนุญาต Click', Yii::$app->urlManagerBackend->createUrl(['site/index']), ['class' => 'btn btn-primary btn-lg']) ?>
        </h1>
    </div>
    <div class="body-content">
        <!-- Page Features -->
        <!-- /.row -->
        <?php
//        echo Yii::$app->urlManagerBackend->createAbsoluteUrl(['site/index', 'id' => 4]);
//        echo Yii::$app->urlManagerBackend->createUrl(['site/index', 'id' => 4]);
//        echo Yii::$app->urlManagerBackend->getBaseUrl();
//        echo Yii::$app->urlManagerBackend->getHostInfo();
//        echo Yii::$app->urlManagerBackend->getScriptUrl();
        ?>    
        <!--- ไฮไลน์เนื้อหา -->
        <div class="panel-group">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">รายการโปรแกรม และผลการดำเนินงาน<i class="glyphicon glyphicon-arrow-down"></i></a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
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
                                    } elseif ($model->progress >= 70) {
                                        return '
                        <div class="progress">
                          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" style="width:' . $model->progress . '%">
                            ' . $model->progress . '% Complete (success)
                          </div>
                        </div>
                   ';
                                    } elseif ($model->progress >= 50) {
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
                    </div>
                    <div class="panel-footer">รายการโปรแกรม</div>
                </div>
            </div>
        </div>

        <div class="row wellx">
            <div class="col-md-8">
                <h2>ไฮไลน์ <strong>Highlight</strong></h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-file-text-o"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter">รับรองคุณวุฒิ</h4>

                                <p class="tall">ตรวจสอบ รับรองคุณวุฒิ ปริญญา ทั้งในประเทศและต่างประเทศ &gt; <a href="http://203.21.42.34/acc/" target="_blank" title="ระบบรับรองคุณวุฒิ">ระบบรับรองคุณวุฒิ</a></p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="fa fa-heart"></i>
                            </div>

                            <div class="feature-box-info">
                                <h4 class="shorter">การกำหนดตำแหน่ง</h4>

                                <p class="tall">หลักเกณฑ์การกำหนดตำแหน่ง วิธีการแต่งตั้งบุคคลในงานราชการ</p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-tasks"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter">ระบบการประเมิน</h4>

                                <p class="tall">การประเมินผลการปฏิบัติงานแบบกำหนดตัวชี้วัด และ สมรรถนะ</p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-adjust"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter"><a href="ges/announce" title="ระบบพนักงานราชการ">ระบบพนักงานราชการ</a></h4>

                                <p class="tall">ติดตามข่าว ระเบียบ กฎหมาย ที่เกี่ยวข้องกับระบบพนักงานราชการ</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-group"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter">สอบภาค ก</h4>

                                <p class="tall">การทดสอบวัดความรู้ความสามารถทั่วไป เพื่อคัดสรรคนดีคนเก่ง &gt; <a href="http://job3.ocsc.go.th/" target="_blank" title="เว็บสอบภาค ก">เว็บสอบภาค ก</a></p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-money"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter">e-Learning</h4>

                                <p class="tall">การพัฒนาข้าราชการผ่านระบบอิเล็คทรอนิกส์ : <a href="http://ocsc.chulaonline.net/main/default52.asp" target="_blank" title="เข้าสู่เว็บไซต์ e-learning สำนักงาน ก.พ.">เข้าสู่เว็บ e-learning</a></p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-plane"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter"><a href="/scholarship" title="ทุนศึกษาต่อ/ฝึกอบรม">ทุนศึกษาต่อ/ฝึกอบรม</a></h4>

                                <p class="tall">เปิดโอกาสนักเรียนนักศึกษาด้วยทุนศึกษาต่อ และพัฒนาความรู้ข้าราชการด้วยทุนฝึกอบรม วิจัย</p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-box-icon"><i class="icon icon-signal"></i></div>

                            <div class="feature-box-info">
                                <h4 class="shorter"><a href="http://203.21.42.62/wwwshop/" target="_blank">OCSC Media Library</a></h4>

                                <p class="tall">แหล่งรวบรวมวารสารข้าราชการ สื่อสิ่งพิมพ์ล่าสุด ภาพถ่าย วิดีโอ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h2>และอื่นๆ...</h2>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">หนังสือเวียน สำนักงาน ก.พ. </a></h4>
                        </div>

                        <div style="height: 0px;" class="accordion-body collapse" id="collapseOne">
                            <div class="panel-body"><a href="circular" title="ฐานข้อมูลหนังสือเวียน">ระบบฐานข้อมูลหนังสือเวียน</a> ที่ใหญ่ที่สุดของสำนักงาน ก.พ. ค้นหาง่ายตามเลขหนังสือ ปีที่ออก หรือ หมวดหมู่ ในรูปแบบไฟล์ PDF</div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseProcure">ประกาศจัดซื้อจัดจ้าง</a></h4>
                        </div>

                        <div class="accordion-body collapse" id="collapseProcure" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li>ประกาศการจัดซื้อจัดจ้าง ประกาศราคากลาง .. <a href="procurement" title="ประกาศจัดซื้อจัดจ้าง">อ่านประกาศ</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseJob">ข่าวสมัครงาน</a></h4>
                        </div>

                        <div class="accordion-body collapse" id="collapseJob" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li>ประกาศข่าวการรับสมัครงานเพื่อร่วมงานกับ สำนักงาน ก.พ. <a href="recent-content?type=All&amp;field_category_news_tid=88" title="ข่าวสมัครงาน">อ่านข่าวสมัครงาน</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">ระบบสารสนเทศ DPIS </a></h4>
                        </div>

                        <div style="height: 0px;" class="accordion-body collapse" id="collapseTwo">
                            <div class="panel-body">ระบบสารสนเทศทรัพยากรบุคคลระดับกรม/จังหวัด (DPIS/PPIS) เพื่อการบริหารจัดการบุคลากรในหน่วยงาน <a href="dpis">รายละเอียด DPIS</a></div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">ฐานข้อมูลกำลังคนภาครัฐ </a></h4>
                        </div>

                        <div style="height: 0px;" class="accordion-body collapse" id="collapseThree">
                            <div class="panel-body">ระบบสารสนเทศกำลังคนภาครัฐ (Government Manpower Information system : GMIS) เพื่อการบริการจัดการกำลังคนภาครัฐระดับประเทศ <a href="http://gmis.ocsc.go.th" title="GMIS">ระบบ GMIS</a></div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseFour">ความก้าวหน้าในอาชีพ </a></h4>
                        </div>

                        <div style="height: 0px;" class="accordion-body collapse" id="collapseFour">
                            <div class="panel-body">เพิ่มโอกาสทำงานกับหน่วยงานราชการที่เว็บไซต์ <a href="http://job.ocsc.go.th" target="_blank" title="งานราชการ">job.ocsc.go.th</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Accordions Start -->
            <div class="text-center">
                <h3 class="border-successx"><span class="heading_border bg-successx">Accordions</span></h3>
            </div>
            <!-- Accordions End -->
            <div class="col-md-6 col-sm-12">
                <!-- Tabbable-Panel Start -->
                <div class="tabbable-panel">
                    <!-- Tabbablw-line Start -->
                    <div class="tabbable-line">
                        <!-- Nav Nav-tabs Start -->
                        <ul class="nav nav-tabs ">
                            <li class="">
                                <a aria-expanded="false" href="#tab_default_1" data-toggle="tab">
                                    Web </a>
                            </li>
                            <li class="">
                                <a aria-expanded="false" href="#tab_default_2" data-toggle="tab">
                                    Html 5 </a>
                            </li>
                            <li class="">
                                <a aria-expanded="false" href="#tab_default_3" data-toggle="tab">
                                    CSS 3 </a>
                            </li>
                            <li class="active">
                                <a aria-expanded="true" href="#tab_default_4" data-toggle="tab">
                                    Bootstrap </a>
                            </li>
                        </ul>
                        <!-- //Nav Nav-tabs End -->
                        <!-- Tab-content Start -->
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_default_1">
                                <div class="media">
                                    <div class="media-left tab col-sm-12">
                                        <a href="#">
                                            <img class="media-object img-responsive" src="http://joshadmin.com/assets/images/authors/img1.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <p>
                                    Metrics business-to-business beta bootstrapping virality graphical user interface infrastructure conversion launch party long tail. Strategy virality validation bandwidth creative low hanging fruit long tail startup gen-z business plan technology. Strategy termsheet venture stealth non-disclosure agreement accelerator research &amp; development scrum project product management freemium infographic business plan.
                                </p>
                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <div class="media">
                                    <div class="media-left media-middle tab col-sm-12">
                                        <a href="#">
                                            <img class="media-object img-responsive" src="http://joshadmin.com/assets/images/authors/img2.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <p>
                                    Branding iteration conversion market sales advisor holy grail entrepreneur backing. Gen-z non-disclosure agreement holy grail business-to-consumer disruptive deployment marketing channels seed money seed round ramen pivot social proof. Venture creative metrics focus A/B testing crowdfunding. IPhone scrum project user experience freemium interaction design long tail stealth ownership hackathon crowdfunding investor.
                                </p>
                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <div class="media">
                                    <div class="media-left media-middle tab col-sm-12">
                                        <a href="#">
                                            <img class="media-object img-responsive" src="http://joshadmin.com/assets/images/authors/img3.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <p>
                                    Beta analytics startup direct mailing leverage learning curve www.discoverartisans.com business-to-consumer. IPad metrics channels pivot deployment business plan android burn rate hackathon vesting period research &amp; development launch party user experience. Seed round freemium value proposition learning curve series A financing funding research &amp; development crowdsource. 
                                </p>
                            </div>
                            <div class="tab-pane active" id="tab_default_4">
                                <div class="media">
                                    <div class="media-left media-middle tab col-sm-12">
                                        <a href="#">
                                            <img class="media-object img-responsive" src="http://joshadmin.com/assets/images/authors/img4.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <p>
                                    Paradigm shift twitter pitch research &amp; development venture. Startup partnership www.discoverartisans.com supply chain crowdsource hackathon metrics paradigm shift interaction design influencer holy grail first mover advantage ramen validation. User experience founders burn rate learning curve infographic leverage gen-z supply chain first mover advantage. 
                                </p>
                            </div>
                        </div>
                        <!-- Tab-content End -->
                    </div>
                    <!-- //Tabbablw-line End -->
                </div>
                <!-- Tabbable_panel End -->
            </div>
            <div class="col-md-6 col-sm-12">
                <!-- Panel-group Start -->
                <div class="panel-group" id="accordion">
                    <!-- Panel Panel-default Start -->
                    <div class="panel panel-default">
                        <!-- Panel-heading Start -->
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                                <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <span class="glyphicon success glyphicon-plus"></span>
                                    <span class="success">Why Choose Us</span></a>
                            </h4>
                        </div>
                        <!-- //Panel-heading End -->
                        <!-- Collapseone Start -->
                        <div style="height: 0px;" aria-expanded="false" id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>In 1972 a crack commando unit was sent to prison by a military court for a crime they didn't commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Here's the story of a man named Brady who was busy with three boys of his own. One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated? Till the one day when the lady met this fellow and they knew it was much more than a hunch. Baby if you've ever wondered.
                                </p>
                            </div>
                        </div>
                        <!-- Collapseone End -->
                    </div>
                    <!-- //Panel Panel-default End -->
                    <div class="panel panel-default">
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                                <a aria-expanded="false" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <span class="glyphicon success glyphicon-plus"></span>
                                    <span class="success">Why Choose Us</span>
                                </a>
                            </h4>
                        </div>
                        <div style="height: 0px;" aria-expanded="false" id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                                <a aria-expanded="true" class="" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <span class="glyphicon success glyphicon-minus"></span>
                                    <span class="success">Why Choose Us</span></a>
                            </h4>
                        </div>
                        <div style="" aria-expanded="true" id="collapseThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                    In 1972 a crack commando unit was sent to prison by a military court for a crime they didn't commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Here's the story of a man named Brady who was busy with three boys of his own. One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated? Till the one day when the lady met this fellow and they knew it was much more than a hunch. Baby if you've ever wondered.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Panle-group End -->
            </div>
        </div>
    </div>
    <!-- footer  -->
    <footer class="footerx image-round">
        <div class="row">
            <!-- About Us Section Start -->
            <div class="col-sm-4">
                <h4>About Us</h4>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
            </div>
            <!-- //About us Section End -->
            <!-- Contact Section Start -->
            <div class="col-sm-4">
                <h4>Contact Us</h4>
                <ul class="list-unstyled">
                    <li>35,Lorem Lis Street, Park Ave</li>
                    <li>Lis Street, India.</li>
                    <li><i style="width: 18px; height: 18px;" id="livicon-44" class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"><svg id="canvas-for-livicon-44" style="overflow: hidden; position: relative; left: -0.5px; top: -0.583252px;" xmlns="http://www.w3.org/2000/svg" width="18" version="1.1" height="18"><desc>Created with Raphaël 2.1.0</desc><defs></defs><path transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0" d="M12,9L12,9L12,9L12,9L12,9ZM16,9L16,9L16,9L16,9L16,9ZM20,9L20,9L20,9L20,9L20,9ZM12,13L12,13L12,13L12,13L12,13ZM16,13L16,13L16,13L16,13L16,13ZM20,13L20,13L20,13L20,13L20,13ZM12,17L12,17L12,17L12,17L12,17ZM16,17L16,17L16,17L16,17L16,17ZM20,17L20,17L20,17L20,17L20,17ZM12,21L12,21L12,21L12,21L12,21ZM16,21L16,21L16,21L16,21L16,21ZM20,21L20,21L20,21L20,21L20,21Z" stroke="none" fill="#cccccc" style=""></path><path transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0" d="M21.977,2H10.021C8.905,2,8,2.904,8,4.022V27.978C8,29.094,8.904,30,10.021,30H21.976C23.094,30,24,29.094,24,27.979V4.022C24,2.904,23.094,2,21.977,2ZM14.301,3.5H17.697C17.863,3.5,18,3.724,18,4S17.863,4.5,17.697,4.5H14.300999999999998C14.133,4.5,14,4.273,14,4C14,3.721,14.133,3.5,14.301,3.5ZM12.5,3.5C12.777,3.5,13,3.724,13,4C13,4.274,12.777,4.5,12.5,4.5S12,4.276,12,4C12,3.723,12.223,3.5,12.5,3.5ZM16,28.5C15.172,28.5,14.5,27.828,14.5,27.002C14.5,26.166,15.172,25.5,16,25.5S17.5,26.174,17.5,27.002C17.5,27.828,16.828,28.5,16,28.5ZM22,24H10V6H22V24Z" stroke="none" fill="#cccccc" style=""></path></svg></i>Phone:9140 123 4588</li>
                    <li><i style="width: 18px; height: 18px;" id="livicon-45" class="livicon icon4 icon3" data-name="printer" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"><svg id="canvas-for-livicon-45" style="overflow: hidden; position: relative; left: -0.5px; top: -0.083252px;" xmlns="http://www.w3.org/2000/svg" width="18" version="1.1" height="18"><desc>Created with Raphaël 2.1.0</desc><defs></defs><path transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0" opacity="0" d="M23,13H9V12H23V13ZM23,15H9V16H23V15ZM23,18H9V19H23V18ZM23,21H9V22H23V21ZM23,24H9V25H23V24ZM23,27H9V28H23V27Z" stroke="none" fill="#cccccc" style="opacity: 0;"></path><path transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0" d="M26,10C26,8,22,4,20,4H6.6C6.269,4,6,4.269,6,4.6V12H5C3.3440000000000003,12,2,13.094,2,14.75V23.4C2,23.73,2.269,24,2.6,24H6V27.4C6,27.73,6.269,28,6.6,28H25.4C25.729999999999997,28,26,27.73,26,27.4V24H29.4C29.729999999999997,24,30,23.73,30,23.4V14.749999999999998C30,13.093999999999998,28.656,11.999999999999998,27,11.999999999999998H26V10ZM24,26H8V23H24V26ZM24,12H8V6H20C21.199,6,20,10,20,10S24,8.1,24,10V12ZM27,16C26.447,16,26,15.553,26,15S26.447,14,27,14S28,14.447,28,15S27.553,16,27,16Z" stroke="none" fill="#cccccc" style=""></path></svg></i> Fax:400 423 1456</li>
                    <li><i style="width: 20px; height: 20px;" id="livicon-46" class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc" data-hc="#ccc"><svg id="canvas-for-livicon-46" style="overflow: hidden; position: relative; left: -0.5px; top: -0.583252px;" xmlns="http://www.w3.org/2000/svg" width="20" version="1.1" height="20"><desc>Created with Raphaël 2.1.0</desc><defs></defs><path transform="matrix(0.625,0,0,0.625,0,0)" stroke-width="0" opacity="1" d="M3.2,24C2.537,24,2,23.463,2,22.801V11.5L14.113,21.024C15.155,21.842000000000002,16.844,21.842000000000002,17.886,21.024L30,11.5V22.801000000000002C30,23.463,29.463,24,28.801,24H3.2ZM28.801,8H3.2C2.537,8,2,8.537,2,9.2V9.957999999999998L14.113,19.476999999999997C15.155,20.292999999999996,16.843,20.292999999999996,17.886,19.476999999999997L30,9.958V9.2C30,8.537,29.463,8,28.801,8ZM19.501,11H13.278000000000002C13.415000000000003,11.306,13.495000000000003,11.644,13.498000000000003,12H17.501000000000005C17.776,12,18,12.224,18,12.5S17.776,13,17.501,13H13.3C12.919,13.894,12.033000000000001,14.521,11,14.521C9.619,14.521,8.5,13.401,8.5,12.021S9.619,9.521,11,9.521C11.547,9.521,12.049,9.702,12.461,10H19.501C19.776,10,20,10.224,20,10.5S19.776,11,19.501,11Z" stroke="none" fill="#cccccc" style="opacity: 1;"></path></svg></i> Email:<span class="text-success">
                            info@joshadmin.com</span>
                    </li>
                    <li><i style="width: 18px; height: 18px;" id="livicon-47" class="livicon icon4 icon3" data-name="skype" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"><svg id="canvas-for-livicon-47" style="overflow: hidden; position: relative; left: -0.5px; top: -0.083252px;" xmlns="http://www.w3.org/2000/svg" width="18" version="1.1" height="18"><desc>Created with Raphaël 2.1.0</desc><defs></defs><path transform="matrix(0.5625,0,0,0.5625,0,0)" stroke-width="0" d="M29.009,18.973C29.209,18.064,29.314,17.118,29.314,16.149C29.314,8.877,23.418,2.9810000000000016,16.144,2.9810000000000016C15.376999999999999,2.9810000000000016,14.623999999999999,3.0470000000000015,13.892999999999999,3.173000000000002C12.718,2.431,11.325,2,9.832,2C5.614,2,2.195,5.418,2.195,9.636C2.195,11.046,2.578,12.364999999999998,3.245,13.497C3.069,14.354,2.979,15.238,2.979,16.146C2.979,23.419,8.875,29.313000000000002,16.146,29.313000000000002C16.970000000000002,29.313000000000002,17.776,29.238000000000003,18.560000000000002,29.092000000000002C19.634,29.673,20.862,30,22.17,30C26.387,30,29.805,26.583,29.805,22.363C29.803,21.145,29.518,19.994,29.009,18.973ZM16.006,25.156C14.659,25.151999999999997,13.034,24.99,11.695,24.363999999999997C9.742,23.449999999999996,8.289,21.762999999999998,8.279,19.865C8.277,19.381999999999998,8.696,18.064999999999998,10.203,18.110999999999997C10.654,18.124999999999996,11.495,18.163999999999998,12.136,19.642999999999997C12.956,21.538999999999998,13.796,22.063999999999997,15.907,22.176C17.196,22.244,19.496,21.662999999999997,19.535,19.842999999999996C19.546,19.321999999999996,19.357,18.922999999999995,19.027,18.592999999999996C18.296,17.862999999999996,17.095000000000002,17.661999999999995,15.205000000000002,17.220999999999997C13.844000000000001,16.902999999999995,8.596000000000002,16.161999999999995,8.64,11.890999999999996C8.653,10.661999999999995,9.296000000000001,6.8619999999999965,15.955000000000002,6.842999999999996C21.496000000000002,6.826999999999996,22.996000000000002,9.961999999999996,22.895000000000003,11.272999999999996C22.795,12.573999999999996,21.996000000000002,13.060999999999996,21.004000000000005,13.108999999999996C19.895000000000003,13.162999999999997,19.374000000000006,12.192999999999996,19.083000000000006,11.708999999999996C18.095000000000006,10.062999999999995,17.395000000000007,9.723999999999997,15.703000000000007,9.739999999999997C13.295000000000007,9.762999999999996,12.595000000000006,10.962999999999997,12.604000000000006,11.563999999999997C12.609000000000007,11.863999999999997,12.682000000000006,12.123999999999997,12.867000000000006,12.331999999999997C13.695000000000006,13.262999999999998,15.498000000000006,13.547999999999996,16.533000000000005,13.786999999999997C18.595000000000006,14.262999999999998,20.579000000000004,14.783999999999997,21.699000000000005,15.575999999999997C23.095000000000006,16.562999999999995,23.763000000000005,17.662999999999997,23.718000000000004,19.464C23.596,24.265,18.795,25.164,16.006,25.156Z" stroke="none" fill="#cccccc" style=""></path></svg></i> Skype:
                        <span class="text-success">Joshadmin</span>
                    </li>
                </ul>
            </div>
            <!-- //Contact Section End -->
            <!-- Recent post Section Start -->
            <div class="col-sm-4">
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="http://joshadmin.com/assets/images/c1.jpg" alt="image">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry dummy.
                        </p>
                        <p class="pull-right"><i>John Doe</i></p>
                    </div>
                </div>
            </div>
            <!-- //Recent Post Section End -->
        </div>
    </footer>
</div>

