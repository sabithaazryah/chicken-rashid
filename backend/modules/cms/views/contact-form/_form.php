<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContactForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'date')->textInput() ?>
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
