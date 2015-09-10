<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
?>


<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">


        <!-- sidebar-menu. -- Start -->

        <ul class="sidebar-menu">
            <li>
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu</span>
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




