<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AvensiaTechContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avensia-tech-content-form form-inline">

	<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
			<?= $form->field($model, 'information_technology')->textInput()->label('Information Technology (Seperated by commas)') ?>
		</div>
		<div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
			<?= $form->field($model, 'technical')->textInput()->label('Technical Services (Seperated by commas)') ?>
		</div>

	</div>
	<div class="row">
		<div class='col-md-12 col-sm-12 col-xs-12'>
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success', 'style' => 'float:right;']) ?>
			</div>
		</div>
	</div>
	<?php ActiveForm::end(); ?>

</div>
