<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
        $this->title = $meta_tags->meta_title;
} else {
        $this->title = 'Chicken Rashid';
}
?>
<section id="main" class="site-main">
        <section id="opal-breadscrumb" class="opal-breadscrumb mbtmo" style="">
                <div class="container">
                        <ol class="breadcrumb">
                                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a> </li>
                                <li class="active">Menus</li>
                        </ol>
                </div>
        </section>
</section>

<section id="main-container" class="container-fluid inner menus-page">
        <div class="row">
                <div id="main-content" class="main-content col-xs-12 col-lg-12 col-md-12">
                        <div id="primary" class="content-area">
                                <div id="content" class="site-content" role="main">
                                        <div class="menus-div">
                                                <div class="kc-row-container  kc-container">
                                                        <div class="kc-wrap-columns">
                                                                <div class="kc-elm kc-css-925480 col-sm-12 column col-sm-12">
                                                                        <div class="kc-col-container">
                                                                                <?= common\widgets\Alert::widget() ?>
                                                                                <div href="" class="element-block-heading style-special">
                                                                                        <div class="inner">
                                                                                                <h2 class="heading">Daily Menu</h2>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="widget products-category-tabs">
                                                                                        <div class="clearfix"></div>
                                                                                        <div class="products-collection woocommerce product-list">
                                                                                                <div class="tab-content">
                                                                                                        <div id="tab-15293918131811851232-burgers" class="tab-pane  active">
                                                                                                                <div class="row">
                                                                                                                        <?php foreach ($menus as $menu) { ?>

                                                                                                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                                                                                                        <div class="product-block" data-product-id="<?= $menu->id ?>">
                                                                                                                                                <figure class="image">
                                                                                                                                                        <a title="<?= $menu->name ?>" href="#" class="product-image zoom-2">
                                                                                                                                                                <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>uploads/daily-menus/<?= $menu->id ?>/image.<?= $menu->image ?>" class=" wp-post-image" alt="" />
                                                                                                                                                        </a>
                                                                                                                                                </figure>
                                                                                                                                                <div class="meta">
                                                                                                                                                        <h3 class="name"><a href="#"><?= $menu->name ?></a></h3>
                                                                                                                                                        <div class="decreption"><?= $menu->description ?></div>

                                                                                                                                                        <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span><?= $menu->price ?></span>
                                                                                                                                                        </span>
                                                                                                                                                        <div class="add-cart"><a title="Read more" rel="nofollow" href="#" data-quantity="1" data-product_id="<?= $menu->id ?>" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn-cart cart-enquiry" data-toggle='modal' data-target='#get-enquiry-modal'><span class="title-cart">Enquiry now</span></a></div>
                                                                                                                                                </div>

                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        <?php } ?>


                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="hot-deals">
                                                <div class="kc-row-container  kc-container">
                                                        <div class="kc-wrap-columns">
                                                                <div class="kc-elm kc-css-234433 kc_col-sm-12 kc_column kc_col-sm-12">
                                                                        <div class="kc-col-container">
                                                                                <div href="" class="element-block-heading style-special">
                                                                                        <div class="inner">
                                                                                                <h2 class="heading">Hot Deals</h2>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="widget products-category-tabs">
                                                                                        <div class="clearfix"></div>
                                                                                        <div class="products-collection woocommerce">
                                                                                                <div class="tab-content">
                                                                                                        <div id="tab-1529391812211609622-pizza" class="tab-pane active">
                                                                                                                <div id="carousel-1529391812211609622-pizza" class="inner owl-carousel-play" data-ride="owlcarousel">
                                                                                                                        <div class="carousel-controls">
                                                                                                                                <a class="left carousel-control" href="#carousel-1529391812211609622-pizza" data-slide="prev">
                                                                                                                                        <i aria-hidden="true" class="fa fa-long-arrow-left"></i>
                                                                                                                                </a>
                                                                                                                                <a class="right carousel-control" href="#carousel-1529391812211609622-pizza" data-slide="next">
                                                                                                                                        <i aria-hidden="true" class="fa fa-long-arrow-right"></i>
                                                                                                                                </a>
                                                                                                                        </div>
                                                                                                                        <div class="owl-carousel rows-products" data-slide="4" data-pagination="false" data-navigation="flase">
                                                                                                                                <div class="product-block" data-product-id="13435">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Blue Moon Burgers" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" />
                                                                                                                                                </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                                <div class="product-block" data-product-id="13372">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Guinness Burgers" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                                <div class="product-block" data-product-id="13368">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Fajita Turkey Burgers" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                                <div class="product-block" data-product-id="50">
                                                                                                                                        <figure class="image">
                                                                                                                                                <span class="onsale">Sale!</span>
                                                                                                                                                <a title="The Texas Squealer Burger" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                                <div class="product-block" data-product-id="13431">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Tomato pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                                <div class="product-block" data-product-id="13377">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="California Pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/image-5.jpg" class="wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="menus-div">
                                                <div class="kc-row-container  kc-container">
                                                        <div class="kc-wrap-columns">
                                                                <div class="kc-elm kc-css-925480 col-sm-12 column col-sm-12">
                                                                        <div class="kc-col-container">
                                                                                <div href="" class="element-block-heading style-special">
                                                                                        <div class="inner">
                                                                                                <h2 class="heading">Chef's Speciality</h2>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="widget products-category-tabs">
                                                                                        <div class="clearfix"></div>
                                                                                        <div class="products-collection woocommerce product-list">
                                                                                                <div class="tab-content">
                                                                                                        <div id="tab-15293918131811851232-pizza" class="tab-pane active">
                                                                                                                <div class="row">
                                                                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                                                                                <div class="product-block" data-product-id="13431">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Tomato pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/product-17-465x528.jpg" class=" wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                        <div class="meta">
                                                                                                                                                <h3 class="name"><a href="#">Tomato pizza</a></h3>
                                                                                                                                                <div class="decreption">Fast food refers to food that can be prepared and served ...</div>


                                                                                                                                                <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>9.99</span> &ndash; <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>39.99</span>
                                                                                                                                                </span>
                                                                                                                                                <div class="add-cart"><a title="Read more" rel="nofollow" href="#" data-quantity="1" data-product_id="13431" data-product_sku="" class="button product_type_variable add_to_cart_button btn-cart"><span class="title-cart">Read More</span></a></div>
                                                                                                                                        </div>

                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                                                                                <div class="product-block" data-product-id="13377">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="California Pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/product-10-465x528.jpg" class=" wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                        <div class="meta">
                                                                                                                                                <h3 class="name"><a href="#">California Pizza</a></h3>
                                                                                                                                                <div class="decreption">Fast food refers to food that can be prepared and served ...</div>

                                                                                                                                                <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>130.00</span>
                                                                                                                                                </span>
                                                                                                                                                <div class="add-cart"><a title="Read more" rel="nofollow" href="#" data-quantity="1" data-product_id="13377" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn-cart"><span class="title-cart">Read more</span></a></div>
                                                                                                                                        </div>

                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                                                                                <div class="product-block" data-product-id="13375">
                                                                                                                                        <figure class="image">
                                                                                                                                                <a title="Sicilian Pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/product-8-465x528.jpg" class=" wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                        <div class="meta">
                                                                                                                                                <h3 class="name"><a href="#">Sicilian Pizza</a></h3>
                                                                                                                                                <div class="decreption">Fast food refers to food that can be prepared and served ...</div>


                                                                                                                                                <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>125.00</span>
                                                                                                                                                </span>
                                                                                                                                                <div class="add-cart"><a title="Read more" rel="nofollow" href="#" data-quantity="1" data-product_id="13375" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn-cart"><span class="title-cart">Read more</span></a></div>
                                                                                                                                        </div>

                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                                                                                                                <div class="product-block" data-product-id="13373">
                                                                                                                                        <figure class="image">

                                                                                                                                                <span class="onsale">Sale!</span>
                                                                                                                                                <a title="Neapolitan Pizza" href="#" class="product-image zoom-2">
                                                                                                                                                        <img width="465" height="528" src="<?= Yii::$app->homeUrl ?>images/product-6-465x528.jpg" class=" wp-post-image" alt="" /> </a>
                                                                                                                                        </figure>
                                                                                                                                        <div class="meta">
                                                                                                                                                <h3 class="name"><a href="#">Neapolitan Pizza</a></h3>
                                                                                                                                                <div class="decreption">Fast food refers to food that can be prepared and served ...</div>


                                                                                                                                                <span class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>100.00</span>
                                                                                                                                                        </del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>90.00</span></ins></span>
                                                                                                                                                <div class="add-cart"><a title="Read more" rel="nofollow" href="#" data-quantity="1" data-product_id="13373" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn-cart"><span class="title-cart">Read more</span></a></div>
                                                                                                                                        </div>

                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                </div>
                        </div>
                </div>
        </div>
</section>

<div class="modal fade" id="get-enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>

                                <div class="clearfix"></div>
                        </div>
                        <div class="modal-body">
                                <?= Html::beginForm(['site/menuenquiry'], 'post', ['id' => 'daily-menu-enquiry', '']) ?>
                                <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                                <div class="form-group field-contactform-name required">
                                                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
                                                        <div class="help-block"></div>
                                                </div>
                                        </div>
                                        <input type="hidden" name="cart_item" id="cart_item">
                                        <input type="hidden" name="type" value="1">
                                        <div class="col-md-12 col-sm-12">
                                                <div class="form-group field-contactform-name required">
                                                        <input type="text" name="phone_no" class="form-control" placeholder="Phone No" required="">
                                                        <div class="help-block"></div>
                                                </div>

                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                                <div class="form-group field-contactform-name required">
                                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                                        <div class="help-block"></div>
                                                </div>

                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                                <div class="form-group field-contactform-name required">
                                                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                                        <div class="help-block"></div>
                                                </div>

                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                                <?= Html::submitButton('submit', ['class' => 'submit-btn']) ?>
                                        </div>


                                </div>
                                <?= Html::endForm() ?>
                        </div>
                </div>
        </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.3.1.slim.js"
        integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
crossorigin="anonymous"></script>
<script>
        $(document).ready(function () {
                $('.cart-enquiry').click(function () {
                        var item_id = $(this).attr('data-product_id');
                        $('#cart_item').val(item_id);
                });
        });
</script>

