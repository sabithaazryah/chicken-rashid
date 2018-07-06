<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '';
$arr1 = array(1, 2, 4);
$arr2 = array(5, 6);
$general_trad_link1 = common\models\GeneralTrading::find()->where(['id' => 1])->one();
$tech_page_link1 = common\models\TechnicalServices::find()->where(['id' => 1])->one();
$facility_page_link1 = common\models\FacilityManagement::find()->where(['id' => 1])->one();
$general_trading1 = common\models\GeneralTrading::find()->where(['id' => $arr1])->all();
$general_trading2 = common\models\GeneralTrading::find()->where(['id' => $arr2])->all();
if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Avensia Home';
}
?>
<section class="banner">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- The slide show -->
        <?php if (!empty($sliders)) { ?>
            <div class="carousel-inner">
                <?php
                $i = 0;
                foreach ($sliders as $slider) {
                    $i++;
                    ?>
                    <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>"> <img src="<?= yii::$app->homeUrl; ?>uploads/sliders/<?= $slider->id ?>/<?= $slider->id ?>.<?= $slider->image ?>" alt="<?= $slider->alt_tag ?>" class="img-fluid"> </div>
                <?php }
                ?>
            </div>
        <?php }
        ?>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="fa fa-angle-left"></span> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="fa fa-angle-right"></span> </a>
    </div>
    <!-- close carousel -->
</section>
<section class="home-main-about-section"><!--home-main-about-section-->
    <div class="container">
        <div class="banner-sub-section"><!--banner-sub-section-->
            <div class="row">
                <div class="col-sm-4 boder-right">
                    <div class="cont-box">
                        <?= Html::a('<div class="icon"></div><h1 class="head-style">Avensia General</h1><small class="sub-text">Trading LLC</small>', ['/site/general-trading', 'trade' => $general_trad_link1->canonical_name], ['class' => '']) ?>
                    </div>
                </div>
                <div class="col-sm-4 boder-right">
                    <div class="cont-box">
                        <?= Html::a('<div class="icon icon2"></div><h4 class="head-style">Avensia Tech </h4><small class="sub-text">Solutions LLC</small>', ['/site/technical-service', 'page' => $tech_page_link1->canonical_name], ['class' => '']) ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cont-box boder-none">
                        <?= Html::a('<div class="icon icon3"></div><h4 class="head-style">Avensia Facility </h4><small class="sub-text">Management PVT LTD (IND)</small> ', ['/site/facility-management', 'page' => $facility_page_link1->canonical_name], ['class' => '']) ?>
                    </div>
                </div>
            </div>
        </div>
        <!--banner-sub-section-->
        <div class="sub-section-shadow"></div>
        <!--sub-section-shadow-->
    </div>
    <section class="home-welcome-section"><!--home-welcome-section-->
        <div class="container">
            <div class="welcome-cont-box"> <small class="small">WELCOME TO THE</small>
                <h4 class="head-text"><?= $about_content->title ?></h4>
                <?= $about_content->content ?>
            </div>
        </div>
    </section>
    <!--home-welcome-section-->
</section>
<!--home-main-about-section-->
<section class="home-general-trading-section"><!--home-general-trading-section-->
    <div class="container">
        <div class="main-head">
            <h4 class="head">General trading</h4>
            <small class="small-text">what we provide</small> </div>
        <div class="row">
            <?php
            if (!empty($general_trading1)) {
                $j = 0;
                foreach ($general_trading1 as $value1) {
                    $j++;
                    ?>
                    <div class="col-md-4">
                        <div class="trading-box"> <img src="<?= yii::$app->homeUrl; ?>uploads/general_trading/<?= $value1->id ?>/<?= $value1->id ?>.<?= $value1->image ?>" class="img-fluid" alt="<?= $value1->alt_tag ?>" title="">
                            <div class="head-box">
                                <?php
                                if ($j % 2 == 0) {
                                    $class1 = 'green';
                                } else {
                                    $class1 = 'blue';
                                }
                                ?>
                                <?= Html::a('<div class="' . $class1 . '"><small class="small">' . $value1->title . '</small></div>', ['/site/general-trading', 'trade' => $value1->canonical_name], ['class' => 'dropdown-item']) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            if (!empty($general_trading2)) {
                $k = 0;
                foreach ($general_trading2 as $value2) {
                    $k++;
                    ?>
                    <div class="col-md-6">
                        <div class="trading-box"> <img src="<?= yii::$app->homeUrl; ?>uploads/general_trading/<?= $value2->id ?>/<?= $value2->id ?>.<?= $value2->image ?>" class="img-fluid" alt="<?= $value2->alt_tag ?>" title="">
                            <div class="head-box">
                                <?php
                                if ($k % 2 == 0) {
                                    $class2 = 'blue';
                                } else {
                                    $class2 = 'green';
                                }
                                ?>
                                <?= Html::a('<div class="' . $class2 . '"><small class="small">' . $value2->title . '</small></div>', ['/site/general-trading', 'trade' => $value2->canonical_name], ['class' => 'dropdown-item']) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!--home-general-trading-section-->
<section class="home-avensia-tech"><!--home-avensia-tech-->
    <div class="container">
        <div class="main-head">
            <h2 class="head">Avensia Tech</h2>
            <small class="small-text">technology</small> </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="home-it-section">
                <div class="con-box">
                    <h2 class="head-text">information technology</h2>
                    <ul class="list">
                        <?php
                        if (!empty($it_data_links)) {
                            foreach ($it_data_links as $it_data_link) {
                                ?>
                                <li>
                                    <?= Html::a($it_data_link->service, ['/site/it-service', 'page' => $it_data_link->canonical_name], ['class' => '']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="home-technical-section">
                <div class="con-box">
                    <h2 class="head-text">Technical</h2>
                    <ul class="list">
                        <?php
                        if (!empty($technical_data_links)) {
                            foreach ($technical_data_links as $technical_data_link) {
                                ?>
                                <li>
                                    <?= Html::a($technical_data_link->service, ['/site/technical-service', 'page' => $technical_data_link->canonical_name], ['class' => '']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-facility-management"><!--home-facility-management-->
    <div class="container">
        <div class="main-head">
            <h2 class="head">Facility Management</h2>
            <small class="small-text">Facility Management</small> </div>
        <div class="row">
            <?php
            if (!empty($facility_managements)) {
                $n = 0;
                foreach ($facility_managements as $facility_management) {
                    if (!empty($facility_management)) {
                        $n++;
                        ?>
                        <?php
                        if ($n % 2 == 0) {
                            $class3 = 'green';
                        } else {
                            $class3 = 'blue';
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="facility-box">
                                <img src="<?= yii::$app->homeUrl; ?>uploads/facility_management/<?= $facility_management->id ?>/<?= $facility_management->id ?>.<?= $facility_management->image ?>" class="img-fluid" alt="<?= $facility_management->canonical_name ?>" title="">
                                <div class="head-box">
                                    <?= Html::a('<div class="' . $class3 . '"><small class="small">' . $facility_management->title . '</small></div>', ['/site/facility-management', 'page' => $facility_management->canonical_name], ['class' => '']) ?>
                                </div>
                            </div>
                            <p class="text"><?= $facility_management->description ?></p>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="home-testimonials"><!--home-testimonials-->
    <div class="container">
        <div class="main-head">
            <h2 class="head">Company Testimonial</h2>
            <small class="small-text">our Testimonial</small> </div>
        <div class="row">
            <?php
            if (!empty($testimonials)) {
                foreach ($testimonials as $testimonial) {
                    if (!empty($testimonial)) {
                        ?>
                        <div class="col-lg-6">
                            <div class="Testimonial">
                                <div class="cont-box">
                                    <div class="img-box"><img src="<?= yii::$app->homeUrl; ?>uploads/testimonial/<?= $testimonial->id ?>/<?= $testimonial->id ?>.<?= $testimonial->image ?>" alt="<?= $testimonial->name ?>" class="img-fluid"></div>
                                    <div class="text-box">
                                        <p><?= $testimonial->message ?></p>
                                    </div>
                                    <h3 class="head"><?= $testimonial->name ?></h3>
                                    <small class="small"><?= $testimonial->customr_type ?></small> </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="home-blog"><!--home-blog-->
    <div class="container">
        <div class="main-head">
            <h4 class="head">Our Blog</h4>
            <small class="small-text">Our Blog</small> </div>
        <div class="row">
            <?php
            if (!empty($blogs)) {
                foreach ($blogs as $blog) {
                    if (!empty($blog)) {
                        ?>
                        <div class="col-md-4">
                            <div class="main-blog-box"> <img src="<?= yii::$app->homeUrl; ?>uploads/blog/<?= $blog->id ?>/<?= $blog->id ?>.<?= $blog->image ?>" alt="<?= $blog->blog_heading ?>" class="img-fluid">
                                <div class="cont-box">
                                    <div class="date-box">
                                        <h5 class="d-head"><?= date("d", strtotime($blog->blog_date)); ?></h5>
                                        <b class="b-text"><?= date("M Y", strtotime($blog->blog_date)); ?></b> </div>
                                    <h3 class="head-text"><?= $blog->blog_heading ?></h3>
                                    <p class="text"><?= $blog->small_description ?></p>
                                    <?= Html::a('Read More', ['/site/blog-details', 'id' => $blog->id], ['class' => 'link']) ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
