<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\components\ModalViewWidget;
use common\models\NotificationViewStatus;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <link rel="shortcut icon" href="<?= yii::$app->homeUrl; ?>../images/fav.png" type="image/png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <script src="<?= yii::$app->homeUrl; ?>/js/jquery-1.11.1.min.js"></script>
        <script>
            var homeUrl = '<?= yii::$app->homeUrl; ?>';
        </script>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

    <body class="page-body">

        <div class="page-loading-overlay loaded">
            <div class="loader-2"></div>
        </div>

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebaowered By Azryah Networksr by default, "chat-visible" to make chat appear always -->
            owered By Azryah Networks
            <!-- Add "fixed" class to make the sidebar fixed always to the broowered By Azryah Networkswser viewport. -->
            <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
            <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
            <div class="sidebar-menu toggle-others" style="">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="#" class="logo-expanded">
                                <img src="<?= yii::$app->homeUrl; ?>images/logo@2x.png" width="80" alt="">
                            </a>

                            <a href="dashboard-1.html" class="logo-collapsed">
                                <img src="<?= yii::$app->homeUrl; ?>images/logo-collapsed@2x.png" width="40" alt="">
                            </a>
                        </div>

                        <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                        <div class="mobile-menu-toggle visible-xs">
                            <a href="#" data-toggle="user-info-menu">
                                <i class="fa-bell-o"></i>
                                <span class="badge badge-success">7</span>
                            </a>

                            <a href="#" data-toggle="mobile-menu">
                                <i class="fa-bars"></i>
                            </a>
                        </div>

                    </header>

                    <section class="sidebar-user-info">
                        <div class="sidebar-user-info-inner">
                            <a href="extra-profile.html" class="user-profile">
                                <img src="<?= yii::$app->homeUrl; ?>images/user-4.png" width="45" height="45" class="img-circle img-corona" alt="user-pic">

                                <span>
                                    <strong>John Smith</strong>
                                    <p style="font-size: 11px;"><i class="fa fa-circle text-success"></i> Online</p>
                                </span>
                            </a>
                        </div>
                    </section>

                    <ul id="main-menu" class="main-menu">
                        <?php if (Yii::$app->session['post']['admin'] == 1) { ?>
                            <li class="has-sub expanded">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="title">Admin</span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <?= Html::a('<i class="fa fa-circle-o"></i> Admin Post', ['/admin/admin-post/index'], ['class' => 'title']) ?>
                                    </li>
                                    <li>
                                        <?= Html::a('<i class="fa fa-circle-o"></i> Admin User', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>

                </div>

            </div>
            <div class="main-content">

                <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->

                    <!-- Left links for user info navbar -->
                    <ul class="user-info-menu left-links list-inline list-unstyled">

                        <li class="hidden-sm hidden-xs side-copapse">
                            <a href="#" data-toggle="sidebar">
                                <i class="fa-bars"></i>
                            </a>
                        </li>

                        <li class="dropdown hover-line">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa-bell-o"></i>
                                <span class="badge badge-purple"><?= count($new_notifications) ?></span>
                            </a>

                            <ul class="dropdown-menu notifications">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
                                        You have <strong><?= count($new_notifications) ?></strong> new notifications.
                                    </p>
                                </li>

                            </ul>
                        </li>
                    </ul>


                    <!-- Right links for user info navbar -->
                    <ul class="user-info-menu right-links list-inline list-unstyled">

                        <?= ModalViewWidget::widget() ?>

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
                                        <?= Yii::$app->user->identity->name ?>
                                        <!--<small>Member since Nov. 2012</small>-->
                                    </p>
                                </li>
                                <li class="user-footer" style="background: #eeeeee;">
                                    <div class="row">
                                        <div class="pull-left">
                                            <?= Html::a('Profile', ['/admin/admin-users/update?id=' . Yii::$app->user->identity->id], ['class' => 'btn btn-white', 'style' => 'padding: 9px 20px;border: 1px solid #a09f9f;']) ?>
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
                                <!--                                <li>
                                <?php // Html::a('<i class="fa-wrench"></i>Change Password', ['/admin/admin-users/change-password'], ['class' => 'title']) ?>
                                                                </li>
                                                                <li>
                                <?php // Html::a('<i class="fa-pencil"></i>Edit Profile', ['/admin/admin-users/update?id=' . Yii::$app->user->identity->id], ['class' => 'title']) ?>
                                                                </li>-->

                                <?php
//                                echo '<li class="last">'
//                                . Html::beginForm(['/site/logout'], 'post') . '<a>'
//                                . Html::submitButton(
//                                        '<i class="fa-lock"></i> Logout', ['class' => 'btn logout_btn']
//                                ) . '</a>'
//                                . Html::endForm()
//                                . '</li>';
                                ?>


                            </ul>
                        </li>



                    </ul>

                </nav>

                <?= Alert::widget() ?>
                <?= $content ?>

                <!-- Main Footer -->
                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                <!-- Or class "fixed" to  always fix the footer to the end of page -->
                <footer class="main-footer sticky footer-type-1">

                    <div class="footer-inner">

                        <!-- Add your copyright text here -->
                        <div class="footer-text">
                            &copy; 2017
                            All Rights Reserved. Powered By Azryah Networks
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

            <!--    </div>
            </div>-->

            <div class="footer-sticked-chat"><!-- Start: Footer Sticked Chat -->

                <script type="text/javascript">
                    function toggleSampleChatWindow()
                    {
                        var $chat_win = jQuery("#sample-chat-window");

                        $chat_win.toggleClass('open');

                        if ($chat_win.hasClass('open'))
                        {
                            var $messages = $chat_win.find('.ps-scrollbar');

                            if ($.isFunction($.fn.perfectScrollbar))
                            {
                                $messages.perfectScrollbar('destroy');

                                setTimeout(function () {
                                    $messages.perfectScrollbar();
                                    $chat_win.find('.form-control').focus();
                                }, 300);
                            }
                        }

                        jQuery("#sample-chat-window form").on('submit', function (ev)
                        {
                            ev.preventDefault();
                        });
                    }

                    jQuery(document).ready(function ($)
                    {
                        $(".footer-sticked-chat .chat-user, .other-conversations-list a").on('click', function (ev)
                        {
                            ev.preventDefault();
                            toggleSampleChatWindow();
                        });

                        $(".mobile-chat-toggle").on('click', function (ev)
                        {
                            ev.preventDefault();

                            $(".footer-sticked-chat").toggleClass('mobile-is-visible');
                        });

//                        $('.side-copapse').on('click', function (e) {
//                            if ($('.sidebar-menu.toggle-others').hasClass("collapsed")) {
//                                $('.sidebar-menu .main-menu .expanded .treeview-menu').css('display', 'none');
//                            } else {
//                                $('.sidebar-menu .main-menu .expanded .treeview-menu').css('display', 'block');
//                            }
//                        });
//                        $(".has-sub").hover(
//                                function () {
//                                    $(this).addClass($("expanded"));
//                                    if ($('.sidebar-menu.toggle-others').hasClass("collapsed")) {
//                                        $('.sidebar-menu .main-menu .expanded .treeview-menu').css('display', 'block');
//                                    }
//                                }, function () {
//                            if ($('.sidebar-menu.toggle-others').hasClass("collapsed")) {
//                                $('.sidebar-menu .main-menu .expanded .treeview-menu').css('display', 'none');
//                            }
//                            $(this).removeClass($("expanded"));
//                        }
//                        );
                    });
                </script>



                <a href="#" class="mobile-chat-toggle">
                    <i class="linecons-comment"></i>
                    <span class="num">6</span>
                    <span class="badge badge-purple">4</span>
                </a>

                <!-- End: Footer Sticked Chat -->
            </div>



            <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
