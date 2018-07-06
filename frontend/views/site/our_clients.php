<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

//if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
//    $this->title = $meta_tags->meta_title;
//} else {
//    $this->title = 'Our Clients';
//}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Our Clients</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>Our Clients</span> </div>
    </div>
</div>
</section>

<section class="in-our-clients">
    <div class="container">
        <div class="row">
            <?php
            if (!empty($clients)) {
                foreach ($clients as $client) {
                    if (!empty($client)) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="clients-box">
                                <img src="<?= yii::$app->homeUrl; ?>uploads/our_clients/<?= $client->id ?>/<?= $client->id ?>.<?= $client->logo ?>" alt="<?= $client->client_name ?>" class="img-fluid">
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
