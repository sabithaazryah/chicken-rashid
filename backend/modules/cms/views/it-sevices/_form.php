<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\ItSevices */
/* @var $form yii\widgets\ActiveForm */
$label = 'Image [ File Size :( 750x537 ) ]';
?>

<div class="it-sevices-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['maxlength' => true, 'readonly' => TRUE]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'main_content', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'custom',
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'image', ['options' => ['class' => 'form-group']])->fileInput(['maxlength' => true])->label('Image [ File Size :( 694x332 ) ]') ?>
            <?php
            if ($model->isNewRecord)
                echo "";
            else {
                if (!empty($model->image)) {
                    ?>
                    <div class = "col-md-4 img-box">
                        <div class="news-img">
                            <img class="img-responsive" src="<?= Yii::$app->homeUrl ?>../uploads/it/services/<?= $model->id ?>/image.<?= $model->image; ?>" />
                            <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/it-sevices/remove-directory', 'id' => $model->id], ['class' => 'gal-img-remove']) ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'sub_content', ['options' => ['class' => 'form-group']])->widget(CKEditor::className(), [
                'options' => ['rows' => 2],
                'preset' => 'custom',
            ])
            ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'equipment_list_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'equipment_list')->textInput()->label('Equipment List ( Seperated with commas )') ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'gallery_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'our_partners[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Our Partners Images [ File Size :( 150x150 ) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
            <div class="row box-images">
                <?php
                $path = Yii::getAlias('@paths') . '/it/partners/' . $model->id;
                if (count(glob("{$path}/*")) > 0) {
                    $k = 0;
                    foreach (glob("{$path}/*") as $file) {
                        $k++;
                        $arry = explode('/', $file);
                        $img_nmee = end($arry);

                        $img_nmees = explode('.', $img_nmee);
                        if ($img_nmees['1'] != '') {
                            ?>

                            <div class = "col-md-4 img-box" id="<?= $k; ?>">
                                <div class="news-img">
                                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/it/partners/' . $model->id . '/' . end($arry) ?>">
                                    <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/it-sevices/remove', 'path' => 'it/partners/' . $model->id . '/' . end($arry)], ['class' => 'gal-img-remove']) ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'project_gallery[]', ['options' => ['class' => 'form-group'], 'template' => '{label}<label>Project Gallery Images [ File Size :( 750x537 ) ]</label>{input}{error}'])->fileInput(['multiple' => true])->label(FALSE) ?>
            <div class="row box-images">
                <?php
                $path1 = Yii::getAlias('@paths') . '/it/project_gallery/' . $model->id;
                if (count(glob("{$path1}/*")) > 0) {
                    $k = 0;
                    foreach (glob("{$path1}/*") as $file) {
                        $k++;
                        $arry = explode('/', $file);
                        $img_nmee = end($arry);

                        $img_nmees = explode('.', $img_nmee);
                        if ($img_nmees['1'] != '') {
                            ?>

                            <div class = "col-md-4 img-box" id="<?= $k; ?>">
                                <div class="news-img">
                                    <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/it/project_gallery/' . $model->id . '/' . end($arry) ?>">
                                    <?= Html::a('<i class="fa fa-remove"></i>', ['/cms/it-sevices/remove', 'path' => 'it/project_gallery/' . $model->id . '/' . end($arry)], ['class' => 'gal-img-remove']) ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
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
        $('#itsevices-service').keyup(function () {
            var name = slug($(this).val());
            $('#itsevices-canonical_name').val(slug($(this).val()));
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