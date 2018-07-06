<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/stylesheet.css',
        'css/responsive.css',
        'css/bootstrap.min.css',
        'css/fonts/awesome/css/font-awesome.css',
        'css/animate.css',
        'css/prettyPhoto.css',
    ];
    public $js = [
        'js/jquery-min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/grayscale.js',
        'js/jquery-1.6.1.min.js',
        'js/jquery.prettyPhoto.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
