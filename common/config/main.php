<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'es',
    'sourceLanguage' => 'en-US',
    'name' => 'CUBE',
    'modules' => [
      'user' => [
            'class' => 'dektrium\user\Module',
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule'
        ],
    ],
    'components' => [
        /*'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],*/
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'components\MyManager',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            /*'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => '@backend/controllers/userJson',
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
            ],*/
        ],
    ],
];
