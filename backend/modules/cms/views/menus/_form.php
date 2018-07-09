<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Menus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menus-form form-inline">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
                <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
                        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                        <?=
                        $form->field($model, 'description', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                            'options' => ['rows' => 2],
                            'preset' => 'custom',
                        ])
                        ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
                        <?php
                        if ($model->isNewRecord)
                                echo "";
                        else {
                                if (!empty($model->image)) {
                                        ?>

                                        <img src="<?= Yii::$app->homeUrl ?>../uploads/daily-menus/<?= $model->id ?>/small.<?= $model->image; ?>" width="125" height="100"/>
                                        <?php
                                }
                        }
                        ?>
                        <?= $form->field($model, 'image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Image [ File Size :( 465x528 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
                        <?= $form->field($model, 'image_alt_tag')->textInput(['maxlength' => true]) ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
                        <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
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
