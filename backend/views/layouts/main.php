<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use kartik\widgets\SideNav;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/faviconx.png" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap ">
            <?php
            NavBar::begin([
                //'brandLabel' => 'Dlt-Department Land Of Transport',
                'brandLabel' => Html::img('@web/images/logo.png', ['alt' => Yii::$app->name]),
                //'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-police navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                    //['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                ];
                $menuItems[] = [
                    //'label' => 'Home', 'url' => ['/site/index'],
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
            <div class="row col-lg-3" style="padding-top:100px; margin-right: 10 px">
                <?php
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DANGER,
                    'encodeLabels' => false,
                    'heading' => $heading,
                    'items' => [
                        // Important: you need to specify url as 'controller/action',
                        // not just as 'controller' even if default action is used.
                        ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/site/index', 'type' => $type]), 'active' => ($item == 'home')],
                        ['label' => 'Books', 'icon' => 'book', 'items' => [
                                ['label' => '<span class="pull-right badge">10</span> New Arrivals', 'url' => Url::to(['/site/new-arrivals', 'type' => $type]), 'active' => ($item == 'new-arrivals')],
                                ['label' => '<span class="pull-right badge">5</span> Most Popular', 'url' => Url::to(['/site/most-popular', 'type' => $type]), 'active' => ($item == 'most-popular')],
                                ['label' => 'Read Online', 'icon' => 'cloud', 'items' => [
                                        ['label' => 'Online 1', 'url' => Url::to(['/site/online-1', 'type' => $type]), 'active' => ($item == 'online-1')],
                                        ['label' => 'Online 2', 'url' => Url::to(['/site/online-2', 'type' => $type]), 'active' => ($item == 'online-2')]
                                    ]],
                            ]],
                        ['label' => '<span class="pull-right badge">3</span>ด่านศุลกากร', 'icon' => 'tags', 'items' => [
                                ['label' => 'Fiction', 'url' => Url::to(['/site/fiction', 'type' => $type]), 'active' => ($item == 'fiction')],
                                ['label' => 'Historical', 'url' => Url::to(['/site/historical', 'type' => $type]), 'active' => ($item == 'historical')],
                                ['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
                                        ['label' => 'Event 1', 'url' => Url::to(['/site/event-1', 'type' => $type]), 'active' => ($item == 'event-1')],
                                        ['label' => 'Event 2', 'url' => Url::to(['/site/event-2', 'type' => $type]), 'active' => ($item == 'event-2')]
                                    ]],
                            ]],
                        ['label' => 'User Management', 'icon' => 'user', 'url' => Url::to(['/site/profile', 'type' => $type]), 'active' => ($item == 'profile')],
                    ],
                ]);
                ?>
            </div>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>

                <div class="row col-lg-9" style="margin:10px"><?= $content ?></div>            
            </div>
        </div>

        <footer class="dltfooter">
            <div class="container">
                <p class="pull-left">&copy; <?= Yii::powercorp() ?>  <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::poweredlt() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
