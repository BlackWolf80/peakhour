<?php

// comment out the following two lines when deployed to production


defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');



require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';
require_once __DIR__. '/../functions.php';

(new yii\web\Application($config))->run();


//$identity= new \app\modules\adm\User();
//Yii::$app->user->login($identity, 3600 * 24 * 30);
//Yii::$app->user->identity;