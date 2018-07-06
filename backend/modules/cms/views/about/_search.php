<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AboutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'about_avensia') ?>

    <?= $form->field($model, 'about_avensia_image') ?>

    <?= $form->field($model, 'about_general_trending') ?>

    <?= $form->field($model, 'general_trending_image') ?>

    <?php // echo $form->field($model, 'about_tech_solution') ?>

    <?php // echo $form->field($model, 'tech_solution_image') ?>

    <?php // echo $form->field($model, 'about_facility_management') ?>

    <?php // echo $form->field($model, 'facility_management_image') ?>

    <?php // echo $form->field($model, 'about_it') ?>

    <?php // echo $form->field($model, 'it_image') ?>

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
