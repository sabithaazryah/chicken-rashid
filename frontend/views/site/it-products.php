<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'IT Products';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>IT Products</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>IT Products</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="in-service-section"><!--in-service-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="service-categories">
                    <h2 class="head active"><a data-toggle="collapse"  href="#IT-Services" role="button">IT Services</a></h2>
                    <ul class="list-box collapse" id="IT-Services">
                        <?php
                        if (!empty($it_service_menus)) {
                            foreach ($it_service_menus as $it_service_menu) {
                                ?>
                                <li>
                                    <?= Html::a($it_service_menu->service, ['/site/it-service', 'page' => $it_service_menu->canonical_name], ['class' => 'dropdown-item']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li>
                            <?= Html::a('IT Products', ['/site/it-products'], ['class' => 'dropdown-item']) ?>
                        </li>
                    </ul>
                </div>
                <div class="service-categories">
                    <h2 class="head"><a data-toggle="collapse"  href="" role="button">general trading</a></h2>
                    <ul class="list-box collapse" id="general-trading">
                        <?php
                        if (!empty($general_trading_menus)) {
                            foreach ($general_trading_menus as $general_trading_menu) {
                                ?>
                                <li>
                                    <?= Html::a($general_trading_menu->title, ['/site/general-trading', 'trade' => $general_trading_menu->canonical_name], ['class' => 'dropdown-item']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="service-categories">
                    <h2 class="head"><a data-toggle="collapse"  href="" role="button">technical services</a></h2>
                    <ul class="list-box collapse" id="technical-services">
                        <?php
                        if (!empty($technical_service_menus)) {
                            foreach ($technical_service_menus as $technical_service_menu) {
                                ?>
                                <li>
                                    <?= Html::a($technical_service_menu->service, ['/site/technical-service', 'page' => $technical_service_menu->canonical_name], ['class' => 'dropdown-item']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="service-categories">
                    <h2 class="head"><a data-toggle="collapse"  href="" role="button">facility management</a></h2>
                    <ul class="list-box collapse" id="facility-management">
                        <?php
                        if (!empty($facility_service_menus)) {
                            foreach ($facility_service_menus as $facility_service_menu) {
                                ?>
                                <li>
                                    <?= Html::a($facility_service_menu->service, ['/site/facility-management', 'page' => $facility_service_menu->canonical_name], ['class' => 'dropdown-item']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
         <div class="col-lg-8">
                <div class="service-cont-box">
                        <div class="general-trading-box">
                            <?=
                            $dataProvider->totalcount > 0 ? ListView::widget([
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_it_product_list',
                                        'options' => [
                                            'tag' => 'div',
                                            'class' => 'row'
                                        ],
                                        'itemOptions' => [
                                            'tag' => 'div',
                                            'class' => 'col-lg-4 col-md-6'
                                        ],
                                        'pager' => [
                                            'options' => ['class' => 'pagination'],
                                            'prevPageLabel' => '<', // Set the label for the "previous" page button
                                            'nextPageLabel' => '>', // Set the label for the "next" page button
                                            'firstPageLabel' => '<<', // Set the label for the "first" page button
                                            'lastPageLabel' => '>>', // Set the label for the "last" page button
                                            'nextPageCssClass' => '>', // Set CSS class for the "next" page button
                                            'prevPageCssClass' => '<', // Set CSS class for the "previous" page button
                                            'firstPageCssClass' => '<<', // Set CSS class for the "first" page button
                                            'lastPageCssClass' => '>>', // Set CSS class for the "last" page button
                                            'maxButtonCount' => 5, // Set maximum number of page buttons that can be displayed
                                        ],
                                    ]) : '';
                            ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section><!--in-service-section-->