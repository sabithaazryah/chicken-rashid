<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
        <head>
                <!-- Google Analytics -->

                <!-- End Google Analytics -->
                <meta charset="<?= Yii::$app->charset ?>">
                <link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>images/favicon.png">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="robots" content="noindex,nofollow">
                <script type='text/javascript' src='<?= yii::$app->homeUrl; ?>js/jquery.js'></script>

                <?= Html::csrfMetaTags() ?>
                <title><?= Html::encode($this->title) ?></title>
                <?php $this->head() ?>
        </head>
        <body>
                <?php $this->beginBody() ?>
                <?php $action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id; // controller action id    ?>


        <body class="home page-template-default page page-id-4420 kingcomposer kc-css-system tribe-no-js masthead-fixed">
                <div id="page" class="hfeed site">
                        <div class="opal-page-inner row-offcanvas row-offcanvas-left">

                                <div class="topbar-mobile  hidden-lg hidden-md">
                                        <div class="active-mobile pull-left">
                                                <button data-toggle="offcanvas" class="btn btn-offcanvas btn-toggle-canvas offcanvas" type="button">
                                                        <i class="fa fa-bars"></i>
                                                </button>
                                        </div>
                                </div>
                                <header id="opal-masthead" class="site-header" role="banner">
                                        <div class="container-fuild">
                                                <div class="header-main">
                                                        <div class="logo-wrapper">
                                                                <div id="opal-logo" class="logo logo-theme">
                                                                        <a href="index.php">
                                                                                <img src="<?= Yii::$app->homeUrl ?>images/logo.png" alt="BurgerSlap" />
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <div class="container">
                                                                <div id="opal-mainmenu" class="opal-mainmenu menu-megamenu navbar navbar-mega hidden-xs hidden-sm">
                                                                        <div class="opal-mainmenu hidden-xs hidden-sm">

                                                                                <nav class="opal-primary text-center" role="navigation">
                                                                                        <div class="collapse navbar-collapse navbar-mega-collapse nopadding">
                                                                                                <ul id="menu-primary" class="nav navbar-nav megamenu">

                                                                                                        <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'index' || '' ? 'active' : '' ?>"><?= Html::a('Home', ['/site/index']) ?></li>
                                                                                                        <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'menus' ? 'active' : '' ?>"><?= Html::a('Menus', ['/site/menus']) ?></li>
                                                                                                        <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'contact' ? 'active' : '' ?>"><?= Html::a('Contact', ['/site/contact']) ?></li>
                                                                                                </ul>
                                                                                        </div>
                                                                                </nav>

                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div id="google_translate_element"></div><script type="text/javascript">
                                                                function googleTranslateElementInit() {
                                                                        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,ru,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                                                }
                                                        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                                        <div class="header-support hidden-sm hidden-xs">
                                                                <div class="widget">
                                                                        <div class="text-title">Contact Us</div>
                                                                        <div class="phone">(768)-897-5258</div>
                                                                </div>
                                                        </div>
                                                </div>


                                        </div>

                                        <div id="opal-off-canvas" class="opal-off-canvas sidebar-offcanvas hidden-lg hidden-md">
                                                <div class="opal-off-canvas-body">
                                                        <div class="offcanvas-head clearfix">
                                                                <button type="button" class="btn btn-offcanvas btn-toggle-canvas btn-default" data-toggle="offcanvas">
                                                                        <i class="fa fa-close"></i>
                                                                </button>
                                                                <span>Menu</span>
                                                        </div>
                                                        <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
                                                                <div class="navbar-collapse navbar-offcanvas-collapse">
                                                                        <ul id="main-menu-offcanvas" class="nav navbar-nav">
                                                                                <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'index' || '' ? 'active' : '' ?>"><?= Html::a('Home', ['/site/index']) ?></li>
                                                                                <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'menus' ? 'active' : '' ?>"><?= Html::a('Menus', ['/site/menus']) ?></li>
                                                                                <li id="menu-item-14169" class="<?= Yii::$app->controller->action->id == 'contact' ? 'active' : '' ?>"><?= Html::a('Contact', ['/site/contact']) ?></li>
                                                                        </ul>
                                                                </div>
                                                        </nav>

                                                </div>
                                        </div>

                                </header>

                                <?= $content ?>
                                <?php if (Yii::$app->controller->action->id == 'contact' || '') { ?>
                                        <div id="contact-page-footer">
                                        <?php } ?>
                                        <footer id="opal-footer" class="opal-footer" role="contentinfo">

                                                <div class="mass-bottom">
                                                        <div class="container-fuild">
                                                                <aside id="kc_widget_content-3" class="widget widget-style clearfix kc_widget_content">
                                                                        <div class="kc-content-widget">
                                                                                <style type="text/css">
                                                                                        @media only screen and (min-width: 1000px) and (max-width: 5000px) {
                                                                                                body.kc-css-system .kc-css-428122 {
                                                                                                        width: 100%;
                                                                                                }
                                                                                        }

                                                                                        .kc-css-770077 .kc_column {
                                                                                                padding-left: 0px;
                                                                                                padding-right: 0px;
                                                                                        }

                                                                                        .kc-css-770077>.kc-wrap-columns {
                                                                                                margin-left: -0px;
                                                                                                margin-right: -0px;
                                                                                                width: calc(100% + 0px);
                                                                                        }
                                                                                </style>
                                                                                <section class="kc-elm kc-css-770077 kc_row">
                                                                                        <div class="kc-row-container">
                                                                                                <div class="kc-wrap-columns">
                                                                                                        <div class="kc-elm kc-css-813472 kc_col-sm-12 kc_column kc_col-sm-12">
                                                                                                                <div class="kc-col-container">
                                                                                                                        <div id="map167026914" data-lat="40.6700" data-lng=" -73.9400" class="kc-google-maps opal-kc-google-maps" style="width: 100%;height: 500px;">
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </section>
                                                                        </div>
                                                                </aside>
                                                        </div>
                                                </div>
                                                <div class="footer-bottom">
                                                        <div class="container">
                                                                <div class="inner">
                                                                        <div class="row">
                                                                                <div class="col-md-3 col-sm-12 col-xs-12">
                                                                                        <div class="footer-image">
                                                                                                <aside id="widget_sp_image-32" class="widget clearfix widget_sp_image"><img width="119" height="110" alt="logo-footer" class="attachment-full aligncenter" style="max-width: 100%;" src="<?= Yii::$app->homeUrl ?>images/logo.png" /></aside>
                                                                                                <aside id="text-49" class="widget clearfix widget_text">
                                                                                                        <div class="textwidget">
                                                                                                                <div class="media">
                                                                                                                        <div class="media-left"></div>
                                                                                                                        <div class="media-body">901-947 South Drive, Houston, TX 77057, USA</div>
                                                                                                                </div>
                                                                                                                <div class="media">
                                                                                                                        <div class="media-left"></div>
                                                                                                                        <div class="media-body">support@gmail.com</div>
                                                                                                                </div>
                                                                                                                <div class="media">
                                                                                                                        <div class="media-left"></div>
                                                                                                                        <div class="media-body">655-478-3452</div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </aside>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="column col-md-3 col-sm-12 col-xs-12">
                                                                                        <aside id="text-50" class="widget clearfix widget_text">
                                                                                                <h3 class="widget-title">Hours Open</h3>
                                                                                                <div class="textwidget">
                                                                                                        <ul class="list-unstyled hours-open">
                                                                                                                <li><span>Monday-Thursday</span>11:00-21:00</li>
                                                                                                                <li><span>Friday-Saturday</span>11:30-22:00</li>
                                                                                                                <li><span>Sundays</span>12:00-20:00</li>
                                                                                                        </ul>
                                                                                                </div>
                                                                                        </aside>
                                                                                </div>
                                                                                <div class="column col-md-3 col-sm-12 col-xs-12">
                                                                                        <aside id="mc4wp_form_widget-12" class="widget clearfix widget_mc4wp_form_widget">
                                                                                                <h3 class="widget-title">Newsletter</h3>
                                                                                                <form id="" class="mc4wp-form mc4wp-form-6363 mc4wp-form-basic" method="post" data-name="">
                                                                                                        <div class="mc4wp-form-fields">
                                                                                                                <div class="form-newsletter">
                                                                                                                        <p class="decreptions">
                                                                                                                                Healthy Cooking Is A Must For Families
                                                                                                                        </p>
                                                                                                                        <div class="input-group">
                                                                                                                                <input id="mc4wp_email" class="form-control" name="EMAIL" required="required" type="email" placeholder="email@domain.com" />
                                                                                                                                <button type="submit" class="btn-submit"><i class="fa fa-paper-plane-o"></i></button>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </form>
                                                                                                <!-- / MailChimp for WordPress Plugin -->
                                                                                        </aside>
                                                                                </div>
                                                                                <div class="column col-md-3 col-sm-12 col-xs-12">
                                                                                        <aside id="wpopal_flickr_widget-3" class="widget clearfix widget_wpopal_flickr_widget">
                                                                                                <h3 class="widget-title">Gallery</h3>
                                                                                                <div class="flickr-gallery widget-content">
                                                                                                        <script type="text/javascript">
                                                                function jsonFlickrApi(rsp) {
                                                                        if (rsp.stat != "ok") {
                                                                                // If this executes, something broke!
                                                                                return;
                                                                        }

                                                                        //variable "s" is going to contain
                                                                        //all the markup that is generated by the loop below
                                                                        var s = "";

                                                                        //this loop runs through every item and creates HTML
                                                                        for (var i = 0; i < rsp.photos.photo.length; i++) {
                                                                                photo = rsp.photos.photo[i];
                                                                                //notice that "t.jpg" is where you change the
                                                                                //size of the image
                                                                                t_url = "http://farm2.static.flickr.com/" + photo.server + "/" +
                                                                                        photo.id + "_" + photo.secret + "_" + "s.jpg";

                                                                                p_url = "http://www.flickr.com/photos/" +
                                                                                        photo.owner + "/" + photo.id;

                                                                                s += '<div class="flickr_badge_image"><a href="' + p_url + '">' + '<img alt="' +
                                                                                        photo.title + '"src="' + t_url + '"/>' + '</a></div>';
                                                                        }

                                                                        document.write(s);
                                                                }
                                                                                                        </script>
                                                                                                        <script type="text/javascript" src="https://api.flickr.com/services/rest/?format=json&amp;method=flickr.photos.search&amp;user_id=142095673@N08&amp;api_key=c9d2c2fda03a2ff487cb4769dc0781ea&amp;media=photos&amp;per_page=6&amp;privacy_filter=1"></script>
                                                                                                </div>
                                                                                        </aside>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <section id="opal-copyright" class="opal-copyright clearfix">
                                                        <div class="container">
                                                                <div class="inner">
                                                                        <a href="#" class="scrollup"><span class="fa fa-angle-up"></span></a> Copyright © 2018 - Chicken Rashid - All Rights Reserved.
                                                                </div>
                                                </section>
                                        </footer>
                                        <?php if (Yii::$app->controller->action->id == 'contact' || '') { ?>
                                        </div>
                                <?php } ?>
                        </div>
                </div>
                <?php $this->endBody() ?>

        </body>
</html>
<?php $this->endPage() ?>
