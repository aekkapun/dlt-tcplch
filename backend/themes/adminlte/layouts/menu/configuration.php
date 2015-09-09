<?php

use yii\helpers\Html;
?>
<li class="treeview active">
    <?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>', ['/confciguration/default/index']) ?>
    <ul class="treeview-menu">

        <?php if (Yii::$app->user->can('/configuration/border-checkpoint/index')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i>สำนัก-ด่านศุลกากร', ['/configuration/customs-office/index']) ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i>ด่านศุลกากร', ['/configuration/customs/index']) ?>
            </li>
        <?php endif; ?> 

        <?php if (Yii::$app->user->can('/configuration/border-checkpoint/index')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i>ด่านพรมแดน', ['/configuration/border-checkpoint/index']) ?>
            </li>
        <?php endif; ?> 
        <?php if (Yii::$app->user->can('/configuration/province/index')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i>จังหวัด', ['/configuration/province/index']) ?>
            </li>
        <?php endif; ?> 

        <?php if (Yii::$app->user->can('/student/stu-status/index')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i> Student Status', ['/student/stu-status/index']) ?>
            </li>
        <?php endif; ?> 

        <?php if (Yii::$app->user->can('/student/stu-category/index')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i> Admission Category', ['/student/stu-category/index']) ?>
            </li>
        <?php endif; ?> 

        <?php if (Yii::$app->user->can('/user/resetstudloginid')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i> Reset Login', ['/user/resetstudloginid']) ?>
            </li>
        <?php endif; ?> 

        <?php if (Yii::$app->user->can('/user/resetstudpassword')) : ?>
            <li>
                <?= Html::a('<i class="fa fa-angle-double-right"></i> Reset Password', ['/user/resetstudpassword']) ?>
            </li>
        <?php endif; ?> 

    </ul>
</li>
