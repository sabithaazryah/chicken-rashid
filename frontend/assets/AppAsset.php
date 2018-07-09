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
            'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Oswald:200,300,400,500,600,700|Quicksand:300,400,500,700|Righteous',
            'css/woocommerce.css',
            'css/kingcomposer/kingcomposer.min.css',
            'css/kingcomposer/animate.css',
            'css/kingcomposer/icons.css',
            'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.min.css',
            'css/style.css',
            'css/responsive.css',
        ];
        public $js = [
//            'js/jquery.js',
            'js/functions.js',
            'https://maps.googleapis.com/maps/api/js?key=AIzaSyDRKqMOV24XuzaRMpLKiLnGwDEfauduJ1A&amp;ver=4.9.6',
            'js/jquery.prettyPhoto.min.js',
            'css/revsilider/jquery.themepunch.tools.min.js',
            'css/revsilider/jquery.themepunch.revolution.min.js',
            'js/bootstrap.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.pkgd.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js',
            'js/custom.js',
        ];
        public $depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
        ];

}
