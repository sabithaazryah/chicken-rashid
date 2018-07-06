<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FacilityManagementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facility Managements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-management-index">

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
							    if (!empty($data->image))
								    $img = '<img width="120px" src="' . Yii::$app->homeUrl . '../uploads/facility_management/' . $data->id . '/small.' . $data->image . '"/>';
							    return $img;
						    },
						],
						'title',
						    [
						    'attribute' => 'description',
						    'format' => 'raw',
						    'value' => function ($data) {
							    return wordwrap($data->description, 50, "<br />\n");
						    },
						],
//						'status',
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


