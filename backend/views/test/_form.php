<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Test */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="TestForm w-25">
        <?php $form = ActiveForm::begin(
            [
                'options' => ['enctype' => 'multipart/form-data'],
            ]
        ); ?>
        <div class="">
            <?php echo $form->errorSummary($model)?>
            <?= $form->field($model, 'test_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

            <?php echo $model->getAttributeLabel('has_thumbnail')?>
            <div class="custom-file mb-3 mt-2">

                <input type="file" class="custom-file-input"
                       id="thumbnailTest" name="thumbnailTest">
                <label class="custom-file-label" for="thumbnailTest"></label>
            </div>

            <div class="form-group d-flex justify-content-center">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>


</div>
