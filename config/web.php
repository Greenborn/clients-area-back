<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7hSF802zvlVYMSbq6E6hQlhCvJ-dQw0C',
            'parsers' => [
               'application/json' => 'yii\web\JsonParser',
               'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => null,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
          'transport' => [
              'class' => 'Swift_SmtpTransport',
              'host' => 'test.com.ar',  // ej. smtp.mandrillapp.com o smtp.gmail.com
              'username' => 'test@testz.com.ar',
              'password' => 'test',
              'port' => '587', // El puerto 25 es un puerto común también
              'encryption' => 'tls', // Es usado también a menudo, revise la configuración del servidor
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule','controller' => 'login','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'contact-message','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'change-password','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'change-password-token','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'password-reset','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'profile','pluralize' => false, ],
                ['class' => 'yii\rest\UrlRule','controller' => 'profile-registrable','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'role','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'user','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'public-bussiness-service','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'public-tecnology','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'public-currency','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'public-payment-interval','pluralize' => false,],
                ['class' => 'yii\rest\UrlRule','controller' => 'public-product','pluralize' => false, ],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'sign-up', 'pluralize' => false, ],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'category', 'pluralize' => false,],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'post', 'pluralize' => false,],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'tag', 'pluralize' => false,],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'public-bug-report', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'public-bug-report-image', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'public-proyect', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'public-random-word', 'pluralize' => false],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
