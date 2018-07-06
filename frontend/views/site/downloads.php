<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Downloads';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Download</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>Download</span> </div>
    </div>
</div>
</section>
<!--in-banner-->
<section class="in-download-section"><!--in-download-section-->
    <div class="container">
        <div class="download-top-cont"><p>Our Presence in the UAE Directory Online, please click here to see more products</p>
            <b>Please download the profiles PDF</b>
        </div>
        <div class="row">
            <?php
            if (!empty($downloads)) {
                foreach ($downloads as $value) {
                    if (!empty($value)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="download-box">
                                <div class="img-box">
                                    <img src="<?= yii::$app->homeUrl; ?>uploads/profile_downloads/<?= $value->id ?>/profile_image.<?= $value->image ?>" alt="<?= $value->title ?>" class="img-fluid"> 
                                    <h3 class="head-text"><?= $value->title ?></h3>
                                </div>
                                <a target="_blank" href="<?= yii::$app->homeUrl; ?>uploads/profile_downloads/<?= $value->id ?>/profile_download.<?= $value->pdf ?>" class="link">Download Profiles PDF</a>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section><!--in-download-section-->
