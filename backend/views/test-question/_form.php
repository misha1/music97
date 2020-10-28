<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestQuestion */
/* @var $AnswerModel common\models\Answer */
/* @var $form yii\bootstrap4\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Ответ: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Ответ: " + (index + 1))
    });
});
';

$this->registerJs($js);



?>

<div class="test-question-form w-50" id="test-question">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'dynamic-form',
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>


    <?php echo $form->errorSummary($model)?>
    <?php echo $form->errorSummary($AnswerModel)?>
    <div class="">
        <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'timer')->textInput(['placeholder' => 'HH:MM:SS пример - 21:30:00']) ?>

        <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 8, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $AnswerModel[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'answer'
            ],
        ]); ?>

        <div class="panel panel-default">

            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($AnswerModel as $index => $AnswersModel): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title-address">Ответ: <?= ($index + 1) ?></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$AnswersModel->isNewRecord) {
                                echo Html::activeHiddenInput($AnswersModel, "[{$index}]id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-sm-8 d-flex">
                                    <?= $form->field($AnswersModel, "[{$index}]answer")->textInput(['maxlength' => true])->label(false) ?>
                                    <div class="ml-2">
                                        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                                    </div>
                                 </div><!-- end:row -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php DynamicFormWidget::end(); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
