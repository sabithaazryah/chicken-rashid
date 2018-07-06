<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'about_avensia', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'preset',
            ])
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'about_general_trending', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'preset',
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'about_avensia_image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>About Avensia Image [ File Size :( 550x408 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->about_avensia_image)) {
                    ?>

                    <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/about/about_avensia_image.<?= $model->about_avensia_image; ?>?rand()"/>
                    <?php
                }
            }
            ?>

        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'general_trending_image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>General Trading Image [ File Size :( 550x408 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->general_trending_image)) {
                    ?>

                    <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/about/general_trending_image.<?= $model->general_trending_image; ?>?rand()"/>
                    <?php
                }
            }
            ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'about_tech_solution', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'preset',
            ])
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'about_facility_management', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'preset',
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'tech_solution_image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Tech Solution Image [ File Size :( 550x408 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->tech_solution_image)) {
                    ?>

                    <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/about/tech_solution_image.<?= $model->tech_solution_image; ?>?rand()"/>
                    <?php
                }
            }
            ?>

        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'facility_management_image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Facility Management Image [ File Size :( 550x408 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->facility_management_image)) {
                    ?>

                    <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/about/facility_management_image.<?= $model->facility_management_image; ?>?rand()"/>
                    <?php
                }
            }
            ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'about_it', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'preset',
            ])
            ?>

        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'it_image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Information Technology Image [ File Size :( 550x408 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->it_image)) {
                    ?>

                    <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/about/it_image.<?= $model->it_image; ?>?rand()"/>
                    <?php
                }
            }
            ?>
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
