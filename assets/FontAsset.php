<?php
namespace app\assets;

use yii\web\AssetBundle;

class FontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:400,700',
        '//fonts.googleapis.com/css?family=Ubuntu:400,700',
        '//fonts.googleapis.com/css?family=Oswald:400,700',
        '/fonts/revicons/revicons.eot?5510888',
        '/fonts/revicons/revicons.eot?5510888#iefix',
        '/fonts/revicons/revicons.woff?5510888',
        '/fonts/revicons/revicons.ttf?5510888',
        '/fonts/revicons/revicons.svg?5510888#revicons',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}