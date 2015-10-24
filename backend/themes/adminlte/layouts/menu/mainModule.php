<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-warning">เมนูหลัก</span>
                </a>
            </li>
            <?php if (Yii::$app->user->can('/configuration/default/index')) { ?>
                <li><?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span>', ['/configuration/']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/customs/')) {
                ?>
                <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['/customs/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/guide/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>บริษัท</span>', ['/guide/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/police/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-users"></i> <span>กองตรวจการ</span>', ['/police/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/customs/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-user"></i> <span>กรมศุลกากร</span>', ['/customs/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/dlt/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-inr"></i> <span>กรมการขนส่งทางบก</span>', ['/dlt/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/report/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>ระบบรายงาน Center</span>', ['/report/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/usermanagement/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-user"></i> <span>ระบบจัดการผู้ใช้งาน</span>', ['/usermanagement/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/permitapp/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-file"></i> <span>ระบบการอนุญาต</span>', ['/permitapp/default/index']); ?></li>
                <?php
            }
            if (Yii::$app->user->can('/admin/default/index')) {
                ?>
                <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>การกำหนดสิทธิ์ การใช้งาน</span>', ['/admin/']); ?></li>
            <?php } ?>

        </ul>

        <!-- sidebar-menu. -- End -->

    </section>

</aside>
