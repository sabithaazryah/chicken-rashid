<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Contact Us';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Contact Us</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>Contact</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="in-contact-section"><!--in-about-section-->
    <div class="container">
        <div class="contact-box">
            <div class="main-head">
                <h2 class="head">Avensia Group</h2>
                <small class="small-text">Get in touch with us</small> </div>
            <div class="row">
                <?php
                if (!empty($contact_addresses)) {
                    foreach ($contact_addresses as $contact_address) {
                        if (!empty($contact_address)) {
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="location">
                                    <h2 class="head"><?= $contact_address->address_title ?></h2>
                                    <div class="sub-box">
                                        <?php if ($contact_address->telephone != '') { ?>
                                            <p><b>TEL:</b> <?= $contact_address->telephone ?></p>
                                        <?php }
                                        ?>
                                        <?php if ($contact_address->fax != '') { ?>
                                            <p><b>FAX:</b> <?= $contact_address->fax ?></p>
                                        <?php }
                                        ?>
                                        <?php if ($contact_address->po_box != '') { ?>
                                            <p><b>P.O.BOX:</b> <?= $contact_address->po_box ?></p>
                                        <?php }
                                        ?>
                                        <?php if ($contact_address->address != '') { ?>
                                            <p><?= $contact_address->address ?></p>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php if ($contact_address->tech_solution_phone != '' || $contact_address->general_trading_phone) { ?>
                                        <h2 class="head">Contact Person</h2>
                                        <?php if ($contact_address->tech_solution_phone != '') { ?>
                                            <p><span>Tech Solutions LLC:</span><br> <?= $contact_address->tech_solution_phone ?></p>
                                        <?php }
                                        ?>
                                        <?php if ($contact_address->general_trading_phone != '') { ?>
                                            <p><span>General Trading: </span><br> <?= $contact_address->general_trading_phone ?></p>
                                        <?php }
                                        ?>
                                        <?php if ($contact_address->it_phone != '') { ?>
                                            <p><span>IT Service: </span><br> <?= $contact_address->it_phone ?></p>
                                        <?php }
                                        ?>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section><!--in-about-section-->
<section class="in-contact-form"><!--in-contact-form-->
    <div class="container">
        <div class="main-head">
            <h2 class="head">online enquiry</h2>
            <small class="small-text">contact form</small> </div>
        <?php // \common\widgets\Alert::widget();  ?>
        <?php
        $form = ActiveForm::begin(['id' => 'contact-form', 'options' => [
                        'class' => 'form-theme'
        ]]);
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Full Name <sup>*</sup></label>
                    <input name="ContactForm[name]" type="text" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>email<sup>*</sup></label>
                    <input name="ContactForm[email]" type="email" class="form-control" required >
                </div>
                <div class="form-group">
                    <label>Telephone: (with country code)<sup>*</sup></label>
                    <input name="ContactForm[phone]" type="text" class="form-control" required >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Message<sup>*</sup></label>
                    <textarea name="ContactForm[message]" cols="" rows="" class="form-control" required ></textarea>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Send Request', ['class' => 'submit', 'name' => 'Submit']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section><!--in-contact-form-->
<section class="in-location-map"><!--in-contact-form-->
    <div class="container">
        <div class="main-head">
            <h2 class="head">LOCATION MAP</h2>
            <small class="small-text">LOCATION MAP</small> </div>
        <div class="row">
            <div class="col-md-6">
                <div class="map-box">
                    <h3>Dubai - UAE</h3>
                    <iframe src="https://www.google.com/maps/d/embed?mid=12WSllz1pue8_NxNItCL9wl20QXg" width="100%" height="350"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-box">
                    <h3>Salwa Road, Doha - Qatar</h3>
                    <iframe src="https://www.google.com/maps/d/embed?mid=12WSllz1pue8_NxNItCL9wl20QXg" width="100%" height="350"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-box">
                    <h3>Cochin Office</h3>
                    <iframe src="https://www.google.com/maps/d/embed?mid=12WSllz1pue8_NxNItCL9wl20QXg" width="100%" height="350"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-box">
                    <h3>Representative Office:</h3>
                    <iframe src="https://www.google.com/maps/d/embed?mid=12WSllz1pue8_NxNItCL9wl20QXg" width="100%" height="350"></iframe>
                </div>
            </div>
        </div>

    </div>
</section><!--in-contact-form-->
