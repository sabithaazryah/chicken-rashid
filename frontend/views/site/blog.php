<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Blog';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Blog</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>blog</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="in-blog-section"><!--in-blog-section-->
    <div class="container">
        <div class="row">
            <?php
            if (!empty($blogs)) {
                foreach ($blogs as $blog) {
                    if (!empty($blog)) {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="main-blog-box"> <img src="<?= yii::$app->homeUrl; ?>uploads/blog/<?= $blog->id ?>/<?= $blog->id ?>.<?= $blog->image ?>" alt="<?= $blog->blog_heading ?>" class="img-fluid">
                                <div class="cont-box">
                                    <div class="date-box">
                                        <h2 class="d-head"><?= date("d", strtotime($blog->blog_date)); ?></h2>
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
</section><!--in-blog-section-->
