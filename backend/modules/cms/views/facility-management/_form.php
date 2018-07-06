<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\FacilityManagement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-management-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['maxlength' => true, 'readonly' => TRUE]) ?>

        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
        </div
    </div>
    <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
        <?= $form->field($model, 'image', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Image [ File Size :( 750x565 ) ]</label>{input}{error}'])->fileInput(['maxlength' => true])->label(FALSE) ?>
        <?php
        if ($model->isNewRecord)
            echo "";
        else {
            if (!empty($model->image)) {
                ?>

                <img src="<?= Yii::$app->homeUrl ?>../uploads/facility_management/<?= $model->id ?>/image.<?= $model->image; ?>" width="300" height="100"/>
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
<script>
    $(document).ready(function () {
        $('#facilitymanagement-title').keyup(function () {
            var name = slug($(this).val());
            $('#facilitymanagement-canonical_name').val(slug($(this).val()));
        });
    });

    var slug = function (str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }
</script>
