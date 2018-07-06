<?php

use yii\helpers\Html;
?>
<div class="tradin-main">
    <div class="trading-img-box"><img src="<?= yii::$app->homeUrl; ?>uploads/products/<?= $model->id ?>/<?= $model->id ?>.<?= $model->product_image ?>" class="img-fluid" alt="<?= $model->alt_tag ?>"></div>
    <h3 class="trading-head"><?= $model->product_name ?></h3>
</div>