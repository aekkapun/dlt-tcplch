<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
?>


<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">


        <!-- sidebar-menu. -- Start -->

        <?php
//        Nav::widget(
//                [
//                    'encodeLabels' => false,
//                    'options' => ['class' => 'sidebar-menu'],
//                    'items' => [
//                        '<li class="header">Department Land of Transport</li>',
//                        ['label' => '<i class="fa fa-file-code-o"></i><span>Gii</span>', 'url' => ['/gii']],
//                        ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
//                        [
//                            'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
//                            'url' => ['/site/login'],
//                            'visible' => Yii::$app->user->isGuest
//                        ],
//                    ],
//                ]
//        );
        ?>

        <ul class="sidebar-menu">
            <li>
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-dafault"> <i class="fa fa-home"></i> เมนูหลัก</span>
                </a>
            </li>
            <?php if ($this->context->module->id == 'customs')  ?>
            <?php
            if ($this->context->module->id == 'configuration')
                echo $this->render('menu/configuration');
            else if ($this->context->module->id == 'police')
                echo $this->render('menu/police');
            else if ($this->context->module->id == 'dlt')
                echo $this->render('menu/course');
            else if ($this->context->module->id == 'guide')
                echo $this->render('menu/guide');
            else if ($this->context->module->id == 'customs')
                echo $this->render('menu/admission');
            else if ($this->context->module->id == 'report' || get_class($this->context) == 'app\controllers\LoginDetailsController')
                echo $this->render('menu/report');
            else if ($this->context->module->id == 'dashboard')
                echo $this->render('menu/dashboard');
            else if ($this->context->action->id == 'resetstudloginid' || $this->context->action->id == 'resetstudpassword' || $this->context->action->id == 'updatestudloginid')
                echo $this->render('menu/student');
            else if ($this->context->action->id == 'resetemploginid' || $this->context->action->id == 'resetemppassword' || $this->context->action->id == 'updateemploginid')
                echo $this->render('menu/employee');
            else if ($this->context->action->id == 'error' || $this->context->action->id == 'change')
                echo $this->render('menu/Modules');
            else if ($this->context->module->id == 'permitapp')
                echo $this->render('menu/permitapp');
            else if ($this->context->module->id == 'usermanagement')
                echo $this->render('menu/usermanagement');
            else if ($this->context->module->id == 'admin')
                echo $this->render('menu/rights');
            else
                echo $this->render('menu/config');
            ?>
        </ul>

        <!-- sidebar-menu. -- End -->

    </section>

</aside>




