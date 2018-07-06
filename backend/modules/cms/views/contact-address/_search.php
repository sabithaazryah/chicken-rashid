<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContactAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'address_title') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'telephone') ?>

    <?= $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'po_box') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'tech_solution_phone') ?>

    <?php // echo $form->field($model, 'general_trading_phone') ?>

    <?php // echo $form->field($model, 'it_phone') ?>

    <?php // echo $form->field($model, 'facility_management_phone') ?>

    <?php // echo $form->field($model, 'default_address') ?>

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
