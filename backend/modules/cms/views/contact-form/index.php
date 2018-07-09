<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enquiries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-form-index">

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
                                                [
                                                    'header' => 'Item',
                                                    'attribute' => 'item_id',
                                                    'value' => function($model) {
                                                            if ($model->item_id != '') {
                                                                    $item = common\models\Menus::findOne($model->item_id);
                                                                    return $item->name;
                                                            }
                                                    }
                                                ],
                                                'name',
                                                'email:email',
                                                'phone',
                                                'message:ntext',
                                                // 'date',
                                                ['class' => 'yii\grid\ActionColumn',
                                                    'template' => '{delete}'],
                                            ],
                                        ]);
                                        ?>
                                </div>
                        </div>
                </div>
        </div>
</div>


