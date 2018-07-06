<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TechnicalServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Technical Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technical-services-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if ($data->image != '') {
                                        $dirPath = Yii::getAlias(Yii::$app->params['uploadPath']) . '/../uploads/technical_services/services/' . $data->id . '/small.' . $data->image;
                                        if (file_exists($dirPath)) {
                                            $img = '<img width="120px" src="' . Yii::$app->homeUrl . '../uploads/technical_services/services/' . $data->id . '/small.' . $data->image . '"/>';
                                        } else {
                                            $img = 'No Image';
                                        }
                                    } else {
                                        $img = 'No Image';
                                    }
                                    return $img;
                                },
                            ],
                            'service',
//                            'canonical_name',
                            [
                                'attribute' => 'main_content',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return wordwrap($data->main_content, 50, "<br />\n");
                                },
                            ],
                            // 'sub_title',
                            // 'sub_content:ntext',
                            // 'equipment_list:ntext',
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


