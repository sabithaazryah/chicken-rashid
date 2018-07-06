<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

if (isset($meta_tags->meta_title) && $meta_tags->meta_title != '') {
    $this->title = $meta_tags->meta_title;
} else {
    $this->title = 'Technical Services';
}
?>
<section class="in-banner"><!--in-banner-->
    <div class="container">
        <div class="banner-cont">
            <h2>Technical Service</h2>
        </div>
        <div class="main-breadcrumb">
            <?= Html::a('Home', ['/site/index']) ?><i>|</i><span>technical service</span> </div>
    </div>
</section>
<!--in-banner-->

<section class="in-service-section"><!--in-service-section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="service-categories">
                    <h2 class="head active"><a data-toggle="collapse"  href="" role="button">technical services</a></h2>
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
                    <h2 class="head"><a data-toggle="collapse"  href="#IT-Services" role="button">IT Services</a></h2>
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
                    <h2 class="head"><a data-toggle="collapse"  href="#facility-management" role="button">facility management</a></h2>
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
                    <div class="clear"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="service-cont-box">
                    <h3 class="service-head"><?= $technical_service->service ?></h3>
                    <div class="cont">
                        <?= $technical_service->main_content ?>
                    </div>
                    <?php
                    if ($technical_service->image != '') {
                        $dirPath = Yii::getAlias(Yii::$app->params['uploadPath']) . '/uploads/technical_services/services/' . $technical_service->id . '/' . $technical_service->id . '.' . $technical_service->image;
                        if (file_exists($dirPath)) {
                            echo '<div class="img-box"><img class="img-fluid" src="' . Yii::$app->homeUrl . 'uploads/technical_services/services/' . $technical_service->id . '/' . $technical_service->id . '.' . $technical_service->image . '"/> </div>';
                        } else {
                            echo '';
                        }
                    } else {
                        echo '';
                    }
                    ?>
                    <?php if ($technical_service->sub_title != '') { ?>
                        <h3 class="service-head"><?= $technical_service->sub_title ?></h3>
                    <?php }
                    ?>
                    <?php if ($technical_service->sub_title != '') { ?>
                        <div class="cont">
                            <?= $technical_service->sub_content ?>
                        </div>
                    <?php }
                    ?>
                    <?php if ($technical_service->equipment_list_title != '') { ?>
                        <h3 class="service-head"><?= $technical_service->equipment_list_title ?></h3>
                    <?php }
                    ?>
                    <?php
                    if ($technical_service->equipment_list != '') {
                        $it_equipment_lists = explode(",", $technical_service->equipment_list);
                        if (!empty($it_equipment_lists)) {
                            ?>
                            <div class="list-box">
                                <ul>
                                    <?php foreach ($it_equipment_lists as $it_equipment_list) { ?>
                                        <li><span><?= $it_equipment_list ?></span></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="clear"></div>
                    <?php
                    $path1 = Yii::getAlias('@paths') . '/technical_services/partners/' . $technical_service->id;
                    if (count(glob("{$path1}/*")) > 0) {
                        ?>
                        <?php if ($technical_service->sub_title != '') { ?>
                            <h3 class="service-head"><?= $technical_service->gallery_title ?></h3>
                        <?php } else { ?>
                            <h3 class="service-head">Our Brands</h3>
                        <?php }
                        ?>
                        <div class="brands">
                            <div class="row">
                                <?php
                                $k = 0;
                                foreach (glob("{$path1}/*") as $file) {
                                    $k++;
                                    $arry = explode('/', $file);
                                    $img_nmee = end($arry);

                                    $img_nmees = explode('.', $img_nmee);
                                    if ($img_nmees['1'] != '') {
                                        ?>
                                        <div class="col-md-4">
                                            <div class="brand-box">
                                                <img src="<?= Yii::$app->homeUrl . 'uploads/technical_services/partners/' . $technical_service->id . '/' . end($arry) ?>" alt="technical_services-partner-gallery" class="img-fluid">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $path = Yii::getAlias('@paths') . '/technical_services/project_gallery/' . $technical_service->id;
                    if (count(glob("{$path}/*")) > 0) {
                        ?>
                        <h3 class="service-head">Our Project Gallery </h3>
                        <div class="gallery-main gallery">
                            <div class="row">
                                <?php
                                $k = 0;
                                foreach (glob("{$path}/*") as $file) {
                                    $k++;
                                    $arry = explode('/', $file);
                                    $img_nmee = end($arry);

                                    $img_nmees = explode('.', $img_nmee);
                                    if ($img_nmees['1'] != '') {
                                        ?>
                                        <div class="col-md-6">
                                            <div class="gallery-box ">
                                                <img src="<?= Yii::$app->homeUrl . 'uploads/technical_services/project_gallery/' . $technical_service->id . '/' . end($arry) ?>" alt="technical_services-project-gallery" class="img-fluid">
                                                <div class="title-box">
                                                    <h3></h3>
                                                    <a href="<?= Yii::$app->homeUrl . 'uploads/technical_services/project_gallery/' . $technical_service->id . '/' . end($arry) ?>" rel="prettyPhoto[gallery1]" class="zoom-icon"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!--in-service-section-->
