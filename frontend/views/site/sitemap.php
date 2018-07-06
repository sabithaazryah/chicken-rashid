<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Sitemap';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Sitemap</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>sitemap</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="cont-site-map">
    <div class="container">
         <h2>Pages</h2>
        <div class="col-md-12">
            <ul class="list">
                <ul>
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
                        <?= Html::a('CONTACT', ['/site/contact']) ?>
                    </li>
                </ul>
            </ul>
        </div>
         <h2>Products</h2>
        <div class="col-md-12">
            <ul class="list">
                <ul>
                   <li>
                        <?= Html::a('General trading', ['/site/general-trading']) ?>
                    </li>
                    <li>
                        <?= Html::a('IT', ['/site/it']) ?>
                    </li>
                    <li>
                        <?= Html::a('Technical Service', ['/site/technical-service']) ?>
                    </li>
                    <li>
                        <?= Html::a('Facility Management', ['/site/facility-management']) ?>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</section>
