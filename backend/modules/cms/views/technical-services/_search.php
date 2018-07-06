<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TechnicalServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technical-services-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'service') ?>

    <?= $form->field($model, 'canonical_name') ?>

    <?= $form->field($model, 'main_content') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'sub_title') ?>

    <?php // echo $form->field($model, 'sub_content') ?>

    <?php // echo $form->field($model, 'equipment_list') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
