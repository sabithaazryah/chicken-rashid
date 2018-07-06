<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'IT Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-products-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa-th-list"></i><span> Add Products</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            [
                                'attribute' => 'product_image',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->product_image))
                                        $img = '<img width="120px" src="' . Yii::$app->homeUrl . '../uploads/it_products/' . $data->id . '/small.' . $data->product_image . '"/>';
                                    return $img;
                                },
                            ],
                            'product_name',
                            'alt_tag',
//            'status',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


