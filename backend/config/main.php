<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'name' => 'ระบบการอนุญาตและออกเครื่องหมายการใช้รถ',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@backend/views' => '@backend/themes/adminlte'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/p2made/yii2-sb-admin-theme/views/sb-admin-2',
//                ],
//            ],
//        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
        //'admin/*',
//'gii/*',
//'debug/*',
//'configuration/*',
        ]
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'configuration' => [
            'class' => 'backend\modules\configuration\Module',
        ],
        'usermanagement' => [
            'class' => 'backend\modules\usermanagement\Module',
        ],
        'customs' => [
            'class' => 'backend\modules\customs\CustomsModule',
        ],
        'inspector' => [
            'class' => 'backend\modules\inspector\Module',
        ],
        'police' => [
            'class' => 'backend\modules\police\PoliceModule',
        ],
        'dlt' => [
            'class' => 'backend\modules\dlt\DltModule',
        ],
        'guide' => [
            'class' => 'backend\modules\guide\GuideModule',
        ],
        'permitapp' => [
            'class' => 'backend\modules\permitapp\Module',
        ],
        'report' => [
            'class' => 'backend\modules\report\ReportModule',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */ // fully qualified class name of your User model
// Usually you don't need to specify it explicitly, since the module will detect it automatically
                    'idField' => 'id', // id field of your User model that corresponds to Yii::$app->user->id
                    'usernameField' => 'username', // username field of your User model
//'searchClass' => 'app\models\UserSearch'    // fully qualified class name of your User model for searching
                ]
            ],
        //'layout' => 'left-menu',
        ]
    ],
    'params' => $params,
];


