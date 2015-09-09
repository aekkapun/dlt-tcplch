<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <!-- search form 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <?=
        Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        '<li class="header">Department Land of Transport</li>',
                        ['label' => '<i class="fa fa-file-code-o"></i><span>Gii</span>', 'url' => ['/gii']],
                        ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
                        [
                            'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
                            'url' => ['/site/login'],
                            'visible' => Yii::$app->user->isGuest
                        ],
                    ],
                ]
        );
        ?>

        <ul class="sidebar-menu">


            <li class="treeview active">
                <?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i>', ['/default/index']) ?>
                <ul class="treeview-menu">
                   
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Country', ['/country/index']) ?>
                        </li>
                    
                    
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> State / Province', ['/state/index']) ?>
                        </li>
                   
                    
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> City / Town', ['/city/index']) ?>
                        </li>
                   
                   
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Document Category', ['/document-category/index']) ?>
                        </li>
                        
                        
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Languages', ['/languages/index']) ?>
                        </li>
                        
                        
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> National Holiday', ['/national-holidays/index']) ?>
                        </li>
                    
                    
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Nationality', ['/nationality/index']) ?>
                        </li>
                    
                        <li>
    <?= Html::a('<i class="fa fa-angle-double-right"></i> Institute', ['/organization/index']) ?>
                        </li>

                </ul>
            </li>
                        <li class="treeview ">
                <?= Html::a('<i class="fa fa-user"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>', ['/user/index']) ?>
                <ul class="treeview-menu">
                   
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Permission', ['/admin']) ?>
                        </li>
                    
                    
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> State / Province', ['/state/index']) ?>
                        </li>
                   
                    
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> City / Town', ['/city/index']) ?>
                        </li>
                   
                   
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Document Category', ['/document-category/index']) ?>
                        </li>
                        
                        
                        <li>
                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Languages', ['/languages/index']) ?>
                        </li>
                        
                        
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> National Holiday', ['/national-holidays/index']) ?>
                        </li>
                    
                    
                        <li>
                            <?= Html::a('<i class="fa fa-angle-double-right"></i> Nationality', ['/nationality/index']) ?>
                        </li>
                    
                        <li>
    <?= Html::a('<i class="fa fa-angle-double-right"></i> Institute', ['/organization/index']) ?>
                        </li>

                </ul>
            </li>
        </ul>

    </section>

</aside>
