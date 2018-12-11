<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ServiceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/service/default.css',
        '/css/service/layout.css',
        '/css/service/media-queries.css',
    ];

    public $js = [
        '/js/service/jquery-migrate-1.2.1.min.js',
        'http://maps.google.com/maps/api/js?sensor=true',
        '/js/service/gmaps.js',
        '/js/service/waypoints.js',
        '/js/service/jquery.countdown.js',
        '/js/service/jquery.placeholder.js',
        '/js/service/backstretch.js',
        '/js/service/init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}