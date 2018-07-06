<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$general_tradings = common\models\GeneralTrading::find()->where(['status' => 1])->all();
$it_service_links = common\models\ItSevices::find()->where(['status' => 1])->all();
$technical_service_links = common\models\TechnicalServices::find()->where(['status' => 1])->all();
$facility_service_links = common\models\FacilityManagementDetails::find()->where(['status' => 1])->all();
$contact_info = \common\models\ContactInfo::find()->where(['id' => 1])->one();
$about_footer = \common\models\IndexAbout::find()->where(['id' => 1])->one();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Google Analytics -->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-XXXX-Y', 'auto');
            ga('send', 'pageview');

        </script>
        <!-- End Google Analytics -->
        <meta charset="<?= Yii::$app->charset ?>">
        <link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php $action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id; // controller action id    ?>
        <header class="header"><!--header-->
            <!--head-top-section-->
            <section class="top-section"><!--top-section-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="top-cont-left">Welcome to Avensia Group</div>
                        </div>
                        <div class="col-md-8">
                            <div class="top-right-section">
                                <div class="top-link">
                                    <ul>
                                        <li>
                                            <?= Html::a('Blog', ['/site/blog']) ?>
                                        </li>
                                        <li><span>|</span></li>
                                        <li>
                                            <a href="http://uaeyellowpagesonline.com/companies/avensia-general-trading-llc-1295434.htm" target="_blank">Used Links</a>
                                        </li>
                                        <li><span>|</span></li>
                                        <li>
                                            <?= Html::a('Downloads', ['/site/downloads']) ?>
                                        </li>
                                        <li><span>|</span></li>
                                        <li>
                                            <?= Html::a('Our Clients', ['/site/our-clients']) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="follows-top">
                                    <ul>
                                        <li> <a href="#" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                                        <li> <a href="#" target="_blank"> <i class="fa fa-twitter"></i> </a></li>
                                        <li> <a href="#" target="_blank"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li> <a href="#" target="_blank"> <i class="fa fa-youtube"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--top-section-->
            <section class="head-middle-section"><!--head-top-section-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h1 class="logo">
                                <?= Html::a('<img src="' . yii::$app->homeUrl . 'images/logo.png" alt="Avensia Group" title="Avensia Group" class="img-fluid">', ['/site/index']) ?>
                            </h1>
                        </div>
                        <div class="col-sm-8">
                            <div class="top-contat">
                                <div class="phone"> <small class="small">Facility Management</small>
                                    <h3 class="head-text"><?= $contact_info->facility_management_phone ?></h3>
                                </div>
                                <div class="phone"> <small class="small">IT & Technical Service</small>
                                    <h3 class="head-text"><?= $contact_info->it_phone ?></h3>
                                </div>
                                <div class="phone border-left"> <small class="small">General Trading</small>
                                    <h3 class="head-text"><?= $contact_info->general_trading_phone ?></h3>
                                </div>
                                <div class="mail"> <small class="small">Email:</small>
                                    <h3 class="head-text"><?= $contact_info->email ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="nav-section"><!--nav-section-->
                <div class="container">
                    <div class="main-nav-section">
                        <nav class="navbar navbar-toggleable-lg navbar-light bg-faded navbar-expand-lg">
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="nav_titel">Menu</span>
                                <div class="main-icon-bar"> <i class="fa fa-bars"></i></div>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li>
                                        <?= Html::a('Home', ['/site/index'], ['class' => $action == 'site/index' ? 'active' : '']) ?>
                                    </li>
                                    <li>
                                        <?= Html::a('About Us', ['/site/about'], ['class' => $action == 'site/about' ? 'active' : '']) ?>
                                    </li>
                                    <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/general-trading' ? 'active' : '' ?>">General trading</a>
                                        <ul class="dropdown-menu animated2 fadeInUp">
                                            <?php
                                            if (!empty($general_tradings)) {
                                                foreach ($general_tradings as $general_trading) {
                                                    ?>
                                                    <li>
                                                        <?= Html::a($general_trading->title, ['/site/general-trading', 'trade' => $general_trading->canonical_name], ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/it' || $action == 'site/it-products' ? 'active' : '' ?>">IT</a>
                                        <ul class="dropdown-menu animated2 fadeInUp">
                                            <?php
                                            if (!empty($it_service_links)) {
                                                foreach ($it_service_links as $it_service_link) {
                                                    ?>
                                                    <li>
                                                        <?= Html::a($it_service_link->service, ['/site/it-service', 'page' => $it_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <li>
                                                <?= Html::a('IT Products', ['/site/it-products'], ['class' => 'dropdown-item']) ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/technical-service' ? 'active' : '' ?>">technical service</a>
                                        <ul class="dropdown-menu animated2 fadeInUp">
                                            <?php
                                            if (!empty($technical_service_links)) {
                                                foreach ($technical_service_links as $technical_service_link) {
                                                    ?>
                                                    <li>
                                                        <?= Html::a($technical_service_link->service, ['/site/technical-service', 'page' => $technical_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/facility-management' ? 'active' : '' ?>">facility management</a>
                                        <ul class="dropdown-menu animated2 fadeInUp">
                                            <?php
                                            if (!empty($facility_service_links)) {
                                                foreach ($facility_service_links as $facility_service_link) {
                                                    ?>
                                                    <li>
                                                        <?= Html::a($facility_service_link->service, ['/site/facility-management', 'page' => $facility_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <?= Html::a('gallery', ['/site/gallery'], ['class' => $action == 'site/gallery' ? 'active' : '']) ?>
                                    </li>
                                    <li>
                                        <?= Html::a('Contact', ['/site/contact'], ['class' => $action == 'site/contact' ? 'active' : '']) ?>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="main_head navbar-custom fixed-top" role="navigation"><!--fixed-top header-->
                <div class="heder-fixed">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-4">
                                <h1 class="logo">
                                    <?= Html::a('<img src="' . yii::$app->homeUrl . 'images/top-fixed-logo.png" alt="Avensia Group" title="Avensia Group" class="img-fluid">', ['/site/index']) ?>
                                </h1>
                            </div>
                            <div class="col-lg-10 col-md-8 col-8">
                                <div class="main-nav-section">
                                    <nav class="navbar navbar-toggleable-lg navbar-light bg-faded navbar-expand-lg">
                                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                                            <div class="main-icon-bar"> <i class="fa fa-bars"></i></div>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNavDropdown2">
                                            <ul class="navbar-nav">
                                                <li>
                                                    <?= Html::a('Home', ['/site/index'], ['class' => $action == 'site/index' ? 'active' : '']) ?>
                                                </li>
                                                <li>
                                                    <?= Html::a('About Us', ['/site/about'], ['class' => $action == 'site/about' ? 'active' : '']) ?>
                                                </li>
                                                <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/general-trading' ? 'active' : '' ?>">General trading</a>
                                                    <ul class="dropdown-menu animated2 fadeInUp">
                                                        <?php
                                                        if (!empty($general_tradings)) {
                                                            foreach ($general_tradings as $general_trading) {
                                                                ?>
                                                                <li>
                                                                    <?= Html::a($general_trading->title, ['/site/general-trading', 'trade' => $general_trading->canonical_name], ['class' => 'dropdown-item']) ?>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"> <a href=""  data-toggle="dropdown" class="<?= $action == 'site/it' || $action == 'site/it-products'? 'active' : '' ?>">IT</a>
                                                    <ul class="dropdown-menu animated2 fadeInUp">
                                                        <?php
                                                        if (!empty($it_service_links)) {
                                                            foreach ($it_service_links as $it_service_link) {
                                                                ?>
                                                                <li>
                                                                    <?= Html::a($it_service_link->service, ['/site/it-service', 'page' => $it_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <li>
                                                            <?= Html::a('IT Products', ['/site/it-products'], ['class' => 'dropdown-item']) ?>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="<?= $action == 'site/technical-service' ? 'active' : '' ?>">technical service</a>
                                                    <ul class="dropdown-menu animated2 fadeInUp">
                                                        <?php
                                                        if (!empty($technical_service_links)) {
                                                            foreach ($technical_service_links as $technical_service_link) {
                                                                ?>
                                                                <li>
                                                                    <?= Html::a($technical_service_link->service, ['/site/technical-service', 'page' => $technical_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"> <a href="#"  data-toggle="dropdown" class="<?= $action == 'site/facility-management' ? 'active' : '' ?>">facility management</a>
                                                    <ul class="dropdown-menu animated2 fadeInUp">
                                                        <?php
                                                        if (!empty($facility_service_links)) {
                                                            foreach ($facility_service_links as $facility_service_link) {
                                                                ?>
                                                                <li>
                                                                    <?= Html::a($facility_service_link->service, ['/site/facility-management', 'page' => $facility_service_link->canonical_name], ['class' => 'dropdown-item']) ?>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <?= Html::a('gallery', ['/site/gallery'], ['class' => $action == 'site/gallery' ? 'active' : '']) ?>
                                                </li>
                                                <li>
                                                    <?= Html::a('Contact', ['/site/contact'], ['class' => $action == 'site/contact' ? 'active' : '']) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--fixed-top header-->
            <!--nav-section-->
        </header>
        <?= $content ?>

        <footer class="footer"><!--footer-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="f-head">ABOUT US</h2>
                        <div class="f-about">
                            <p>
                                <?php
                                if (!empty($about_footer)) {
                                    if ($about_footer->about_content_in_footer != '') {
                                        echo $about_footer->about_content_in_footer;
                                    }
                                }
                                ?>
                            </p>
                            <div class="f-follows">
                                <ul>
                                    <li> <span>follow us on  - </span></li>
                                    <?php if (!empty($about_footer)) { ?>
                                        <li> <a href="<?= $about_footer->facebook_link != '' ? $about_footer->facebook_link : '' ?>" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                                        <li> <a href="<?= $about_footer->twitter_link != '' ? $about_footer->twitter_link : '' ?>" target="_blank"> <i class="fa fa-twitter"></i> </a></li>
                                        <li> <a href="<?= $about_footer->linkedin_link != '' ? $about_footer->linkedin_link : '' ?>" target="_blank"> <i class="fa fa-linkedin"></i> </a></li>
                                        <li> <a href="<?= $about_footer->youtube_link != '' ? $about_footer->youtube_link : '' ?>" target="_blank"> <i class="fa fa-youtube"></i> </a></li>
                                    <?php }
                                    ?>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h3 class="f-head">useful links</h3>
                        <ul class="f-list">
                            <li>
                                <?= Html::a('HOME', ['/site/index']) ?>
                            </li>
                            <li>
                                <?= Html::a('ABOUT', ['/site/about']) ?>
                            </li>
                            <li>
                                <?= Html::a('GALLERY', ['/site/gallery']) ?>
                            </li>
                            <li>
                                <?= Html::a('SITEMAP', ['/site/site-map']) ?>
                            </li>
                            <li>
                                <?= Html::a('BLOG', ['/site/blog']) ?>
                            </li>
                            <li>
                                <a href="http://uaeyellowpagesonline.com/companies/avensia-general-trading-llc-1295434.htm" target="_blank">Used Links</a>
                            </li>
                            <li>
                                <?= Html::a('CONTACT', ['/site/contact']) ?>
                            </li>
                            <li>
                                <?= Html::a('OUR CLIENTS', ['/site/our-clients']) ?>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-3">
                        <h3 class="f-head">Our Services</h3>
                        <ul class="f-list">
                            <li>
                                <?= Html::a('General trading', ['/site/general-trading']) ?>
                            </li>
                            <li>
                                <?= Html::a('IT', ['/site/it-service']) ?>
                            </li>
                            <li>
                                <?= Html::a('Technical Service', ['/site/technical-service']) ?>
                            </li>
                            <li>
                                <?= Html::a('Facility Management', ['/site/facility-management']) ?>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-3">
                        <h3 class="f-head">Address</h3>
                        <div class="f-address"><?= $contact_info->addtess ?></div>
                        <div class="f-address f-phone"><small>General Trading</small><?= $contact_info->general_trading_phone ?></div>
                        <div class="f-address f-phone"><small>IT & Technical Service</small><?= $contact_info->it_phone ?></div>
                        <div class="f-address f-phone"><small>Facility Management</small><?= $contact_info->facility_management_phone ?></div>
                        <div class="f-address f-mail"><?= $contact_info->email ?></div>

                    </div>
                </div>
            </div>
        </footer><!--footer-->
        <section class="copyright"><!--copyright-->
            <a href="#" class="scrollup">Scroll</a>
            <div class="container">
                <p>Copyright © <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <b>Avensiauae.</b> All Rights Reserved</p>
            </div>
        </section>

        <?php $this->endBody() ?>
        <script type="text/javascript">
            $(document).ready(function () {

                $(window).scroll(function () {

                    if ($(this).scrollTop() > 100) {

                        $('.scrollup').fadeIn();
                    } else {
                        $('.scrollup').fadeOut();
                    }
                });

                $('.scrollup').click(function () {
                    $("html, body").animate({scrollTop: 0}, 1000);
                    return false;
                });

            });
        </script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 2000, autoplay_slideshow: true});

            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
