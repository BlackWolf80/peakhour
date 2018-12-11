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
class NormalAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/site.css',
        'https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        '/fonts/stroke-gap/style.css',
        '/css/owl.carousel.css',
        '/css/owl.theme.css',
        '/css/owl.carousel.css',
        '/css/owl.theme.css',
        '/css/custom/style.css',
        '/css/responsive/responsive.css',
        '/css/bootstrap.vertical-tabs.css',
    ];

    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js',
        '/js/fliplightbox.min.js',
        '/js/script.js',
        '/js/jquery-2.1.4.js',
        '/js/jquery.bxslider.min.js',
        '/js/bootstrap.min.js',
        '/js/jquery.countTo.js',
        '/js/jquery.fancybox.pack.js',
        '/js/revolution-slider/jquery.themepunch.tools.min.js',
        '/js/revolution-slider/jquery.themepunch.revolution.min.js',
        '/js/revolution-slider/extensions/revolution.extension.actions.min.js',
        '/js/revolution-slider/extensions/revolution.extension.carousel.min.js',
        '/js/revolution-slider/extensions/revolution.extension.kenburn.min.js',
        '/js/revolution-slider/extensions/revolution.extension.layeranimation.min.js',
        '/js/revolution-slider/extensions/revolution.extension.migration.min.js',
        '/js/revolution-slider/extensions/revolution.extension.navigation.min.js',
        '/js/revolution-slider/extensions/revolution.extension.parallax.min.js',
        '/js/revolution-slider/extensions/revolution.extension.slideanims.min.js',
        '/js/revolution-slider/extensions/revolution.extension.video.min.js',
        '/js/owl.carousel.js',
        '/js/owl-custom.js',
        '/js/custom.js',
        '/js/jquery.appear.js', //menu
        '/js/jquery.mCustomScrollbar.concat.min.js', //menu button
        '/js/jquery.mixitup.min.js',
        '/js/embedded.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}