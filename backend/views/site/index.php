<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\AdminPost;
use yii\helpers\ArrayHelper;
use common\models\OrderMaster;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="dashboard">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel">
                <img style="margin: 0 auto;" width="225" class="img-responsive" src="<?= Yii::$app->homeUrl; ?>images/logo.png"/>
                <h4 style="text-align: center;font-weight: 600;text-transform: uppercase;font-size: 20px;color: #FF9800;margin: 40px 0px;">Administrator Control Panel</h4>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>



