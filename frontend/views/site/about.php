<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'About Avensia';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>About us</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>Abouts</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="in-about-section"><!--in-about-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-cont-box"> <small class="small">WELCOME TO THE</small>
                    <h2 class="head-text">Avensia Group</h2>
                    <?= $about_content->about_avensia ?>
                </div>
            </div>
            <div class="col-lg-6"><div class="img-box"><img src="<?= yii::$app->homeUrl; ?>uploads/about/about_avensia_image.<?= $about_content->about_avensia_image ?>" class="img-fluid" alt="about_avensia_image"></div></div>
        </div>
    </div>
</section><!--in-about-section-->
<section class="in-about-section grey-bg"><!--in-about-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><div class="img-box grey-color"><img src="<?= yii::$app->homeUrl; ?>uploads/about/general_trending_image.<?= $about_content->general_trending_image ?>" class="img-fluid" alt="general_trending_image"></div></div>
            <div class="col-lg-6">
                <div class="main-cont-box">
                    <h2 class="head-text head-text2">Avensia General Trading LLC</h2>
                    <?= $about_content->about_general_trending ?>
                </div>
            </div>


        </div>
    </div>
</section><!--in-about-section-->
<section class="in-about-section "><!--in-about-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-cont-box">
                    <h2 class="head-text head-text2">Avensia Tech Solutions LLC</h2>
                    <?= $about_content->about_tech_solution ?>
                </div>
            </div>
            <div class="col-lg-6"><div class="img-box"><img src="<?= yii::$app->homeUrl; ?>uploads/about/tech_solution_image.<?= $about_content->tech_solution_image ?>" class="img-fluid" alt="tech_solution_image"></div></div>

        </div>
    </div>
</section><!--in-about-section-->
<section class="in-about-section grey-bg"><!--in-about-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><div class="img-box grey-color"><img src="<?= yii::$app->homeUrl; ?>uploads/about/facility_management_image.<?= $about_content->facility_management_image ?>" class="img-fluid" alt="facility_management_image"></div></div>
            <div class="col-lg-6">
                <div class="main-cont-box">
                    <h2 class="head-text head-text2">Avensia Facility Management PVT Ltd</h2>
                    <?= $about_content->about_facility_management ?>
                </div>
            </div>


        </div>
    </div>
</section><!--in-about-section-->
<section class="in-about-section "><!--in-about-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-cont-box">
                    <h2 class="head-text head-text2">Avensia Information Technology</h2>
                    <?= $about_content->about_it ?>
                </div>
            </div>
            <div class="col-lg-6"><div class="img-box"><img src="<?= yii::$app->homeUrl; ?>uploads/about/it_image.<?= $about_content->it_image ?>" class="img-fluid" alt="it_image"></div></div>

        </div>
    </div>
</section><!--in-about-section-->
