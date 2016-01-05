<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'yii2-highlight-example',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'nezhelskoy\\highlight\\examples\\controllers',
    'vendorPath' => '@app/../vendor',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KBcetJwcWd5dIE1Z2BBjLx1pzxHwa6jy',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'assetManager' => [
            'bundles' => [
                'nezhelskoy\highlight\HighlightAsset' => [
                    'sourcePath' => '@app/../src/',
                    'css' => ['dist/styles/zenburn.css'],
                ],
            ]
        ],
    ],
    'params' => $params,
];

return $config;
