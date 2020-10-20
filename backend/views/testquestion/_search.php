<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question_id') ?>

    <?= $form->field($model, 'count_answer') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'timer') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'has_thumbnail') ?>

    <?php // echo $form->field($model, 'has_music') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
