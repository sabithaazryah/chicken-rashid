<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MetaTagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meta Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-tags-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                            'page_name',
                            [
                                'attribute' => 'meta_title',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->meta_title)) {
                                        $meta_title = wordwrap($data->meta_title, 50, "<br />\n");
                                        return $meta_title;
                                    } else {
                                        return '';
                                    }
                                },
                            ],
                            [
                                'attribute' => 'meta_description',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->meta_description)) {
                                        $meta_description = wordwrap($data->meta_description, 50, "<br />\n");
                                        return $meta_description;
                                    } else {
                                        return '';
                                    }
                                },
                            ],
                            [
                                'attribute' => 'meta_keyword',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->meta_keyword)) {
                                        $meta_keyword = wordwrap($data->meta_keyword, 50, "<br />\n");
                                        return $meta_keyword;
                                    } else {
                                        return '';
                                    }
                                },
                            ],
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


