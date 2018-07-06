<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>images/favicon.png" type="image/png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="<?= Yii::$app->homeUrl; ?>js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            var homeUrl = '<?= Yii::$app->homeUrl; ?>';
        </script>
        <?php $this->head() ?>
    </head>
    <body class="page-body">
        <?php $this->beginBody() ?>


        <nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->

            <div class="navbar-inner">

                <!-- Navbar Brand -->
                <div class="navbar-brand">
                    <a href="" class="logo">
                        <img src="<?= Yii::$app->homeUrl ?>images/logo.png" width="200" alt="" class="hidden-xs" />
                        <img src="<?= Yii::$app->homeUrl ?>images/logo.png" width="150" alt="" class="visible-xs" />
                    </a>
                </div>

                <!-- Mobile Toggles Links -->
                <div class="nav navbar-mobile">

                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle">
                        <a href="#" data-toggle="mobile-menu-horizontal">
                            <i class="fa-bars"></i>
                        </a>
                    </div>

                </div>

                <div class="navbar-mobile-clear"></div>

                <ul class="navbar-nav">
                    <li>
                        <?= Html::a('<i class="fa-home"></i> <span class="title">Home</span>', ['/site/home'], ['class' => 'title']) ?>
                    </li>
                    <?php
                    if (Yii::$app->session['post']['admin'] == 1) {
                        ?>
                        <li>
                            <a href="">
                                <i class="fa fa-tachometer"></i>
                                <span class="title">Administration</span>
                            </a>
                            <ul>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Access Powers', ['/admin/admin-posts/index'], ['class' => 'title']) ?>
                                </li>

                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Admin Users', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <li>
                        <?= Html::a('<i class="fa fa-sitemap"></i> <span class="title">About Avensia</span>', ['/cms/about/update', 'id' => 1], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-cubes"></i>
                            <span class="title">Home Management</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Sliders', ['/cms/slider/index'], ['class' => 'title']) ?>
                            </li>

                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> About Content', ['/cms/index-about/update', 'id' => 1], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Contact Info', ['/cms/contact-info/update', 'id' => 1], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> General Trading', ['/cms/general-trading/index'], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> IT & Tech Content', ['/cms/avensia-tech-content/update', 'id' => 1], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Facility Management', ['/cms/facility-management/index'], ['class' => 'title']) ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-server"></i>
                            <span class="title">Services</span>
                        </a>
                        <ul>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> General Trading', ['/cms/product/index'], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> IT', ['/cms/it-sevices/index'], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Technical Services', ['/cms/technical-services/index'], ['class' => 'title']) ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-angle-double-right"></i> Facility Management', ['/cms/facility-management-details/index'], ['class' => 'title']) ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-shopping-cart"></i> <span class="title">IT Products</span>', ['/cms/it-products/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-image"></i> <span class="title">Project Gallery</span>', ['/cms/project-gallery/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-map-marker"></i> <span class="title">Contact Address</span>', ['/cms/contact-address/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-comments-o"></i> <span class="title">Testimonials</span>', ['/cms/testimonial/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-rss"></i> <span class="title">Blogs</span>', ['/cms/blog/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-file-pdf-o"></i> <span class="title">Profile Downloads</span>', ['/cms/profile-downloads/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-users"></i> <span class="title">Our Clients</span>', ['/cms/our-client/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-envelope"></i> <span class="title">Enquiries</span>', ['/cms/contact-form/index'], ['class' => 'title']) ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-tags"></i> <span class="title">Meta Tags</span>', ['/cms/meta-tags/index'], ['class' => 'title']) ?>
                    </li>
                </ul>

                <!-- notifications and other links -->
                <ul class="nav nav-userinfo navbar-right">
                    <li>
                        <a href="<?= Yii::$app->homeUrl; ?>site/home"><i class="fa-home"></i> Home</a>
                    </li>

                    <li class="dropdown user-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= yii::$app->homeUrl; ?>images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                            <span>
                                <?= Yii::$app->user->identity->user_name ?>
                                <i class="fa-angle-down"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                            <li class="user-header">
                                <img src="<?= yii::$app->homeUrl; ?>images/user-4.png" alt="user-image" class="img-circle" />
                                <p>
                                    <?= Yii::$app->user->identity->user_name ?>
                                    <!--<small>Member since Nov. 2012</small>-->
                                </p>
                            </li>
                            <li class="user-footer" style="background: #eeeeee;">
                                <div class="row">
                                    <div class="pull-left">
                                        <?= Html::a('Profile', ['/admin/admin-users/update', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-white', 'style' => 'padding: 5px 20px;border: 1px solid #a09f9f;']) ?>
                                    </div>
                                    <div class="pull-right">
                                        <?php
                                        echo ''
                                        . Html::beginForm(['/site/logout'], 'post', ['style' => 'margin-bottom: 0px;']) . '<a>'
                                        . Html::submitButton(
                                                'Sign out', ['class' => 'btn btn-white', 'style' => 'border: 1px solid #a09f9f;']
                                        ) . '</a>'
                                        . Html::endForm()
                                        . '';
                                        ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

        </nav>

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="sidebar-menu toggle-others fixed">

                <div class="sidebar-menu-inner">



                    <ul id="main-menu" class="main-menu">
                        <li>
                            <?= Html::a('<i class="fa-home"></i> <span class="title">Home</span>', ['/site/home'], ['class' => 'title']) ?>
                        </li>
                        <?php
                        if (Yii::$app->session['post']['admin'] == 1) {
                            ?>
                            <li>
                                <a href="">
                                    <i class="fa fa-tachometer"></i>
                                    <span class="title">Administration</span>
                                </a>
                                <ul>
                                    <li>
                                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Access Powers', ['/admin/admin-posts/index'], ['class' => 'title']) ?>
                                    </li>

                                    <li>
                                        <?= Html::a('<i class="fa fa-angle-double-right"></i> Admin Users', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <?= Html::a('<i class="fa fa-sitemap"></i> <span class="title">About Avensia</span>', ['/cms/about/update', 'id' => 1], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-cubes"></i>
                                <span class="title">Home Management</span>
                            </a>
                            <ul>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Sliders', ['/cms/slider/index'], ['class' => 'title']) ?>
                                </li>

                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> About Content', ['/cms/index-about/update', 'id' => 1], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Contact Info', ['/cms/contact-info/update', 'id' => 1], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> General Trading', ['/cms/general-trading/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> IT & Tech Content', ['/cms/avensia-tech-content/update', 'id' => 1], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Facility Management', ['/cms/facility-management/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-server"></i>
                                <span class="title">Services</span>
                            </a>
                            <ul>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> General Trading', ['/cms/product/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> IT', ['/cms/it-sevices/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Technical Services', ['/cms/technical-services/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Facility Management', ['/cms/facility-management-details/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-shopping-cart"></i> <span class="title">IT Products</span>', ['/cms/it-products/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-image"></i> <span class="title">Project Gallery</span>', ['/cms/project-gallery/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-map-marker"></i> <span class="title">Contact Address</span>', ['/cms/contact-address/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-comments-o"></i> <span class="title">Testimonials</span>', ['/cms/testimonial/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-rss"></i> <span class="title">Blogs</span>', ['/cms/blog/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-file-pdf-o"></i> <span class="title">Profile Downloads</span>', ['/cms/profile-downloads/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-users"></i> <span class="title">Our Clients</span>', ['/cms/our-client/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-envelope"></i> <span class="title">Enquiries</span>', ['/cms/contact-form/index'], ['class' => 'title']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="fa fa-tags"></i> <span class="title">Meta Tags</span>', ['/cms/meta-tags/index'], ['class' => 'title']) ?>
                        </li>
                    </ul>

                </div>

            </div>

            <div class="main-content">
                <?= $content; ?>

                <footer class="main-footer sticky footer-type-1">

                    <div class="footer-inner">

                        <!-- Add your copyright text here -->
                        <div class="footer-text">
                            <strong>Copyright © 2018 Avensiauae. All Rights Reserved</strong>
                        </div>


                        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                        <div class="go-up">

                            <a href="#" rel="go-top">
                                <i class="fa-angle-up"></i>
                            </a>

                        </div>

                    </div>

                </footer>
            </div>
        </div>
        <!-- Page Loading Overlay -->
        <!--        <div class="page-loading-overlay">
                    <div class="loader-2"></div>
                </div>-->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>