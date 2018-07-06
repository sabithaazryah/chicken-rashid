<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-address-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php // Html::a('<i class="fa-th-list"></i><span> Create Contact Address</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            'address_title',
//                            'address:ntext',
                            'telephone',
                            'fax',
                            'po_box',
                            'email:email',
                            // 'tech_solution_phone',
                            // 'general_trading_phone',
                            // 'it_phone',
                            // 'facility_management_phone',
                            // 'default_address',
                            // 'status',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


