<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Music */
/* @var $form yii\bootstrap4\ActiveForm */

\backend\assets\TagInputAsset::register($this);
?>

<div class="music-form">

    <?php $form = ActiveForm::begin(
            [
                    'options' => ['enctype' => 'multipart/form-data']
            ]
    );
    ?>

     <div class="row">
         <div class="col-sm-4 offset-1">
             <?php echo $form->errorSummary($model)?>

             <h3>Автор: <?php echo $model->author_name?></h3>

             <div class="d-flex justify-content-center mb-3">
                 <img src="<?php echo $model->getThumbnailLink()?>" alt="Портрет Автора" width="250" height="300">
             </div>

             <div class="custom-file mb-3">
                 <input type="file" class="custom-file-input"
                        id="thumbnail" name="thumbnail">
                 <label class="custom-file-label" for="thumbnail">Изменить портрет автора</label>
             </div>

             <div class="mb-3">Песня: <?php echo $model->music_name?></div>
             <div class="d-flex justify-content-center mb-3">
                 <audio controls preload="metadata" class="w-100">
                     <source src="<?php echo $model->getMusicLink()?>">
                 </audio>
             </div>

             <div class="custom-file mb-3">
                 <input type="file" class="custom-file-input"
                        id="minus" name="minus">
                 <label class="custom-file-label" for="minus">Добавить минусовку</label>
             </div>

             <div class="mb-3">Песня: <?php echo $model->music_name?> (минус)</div>
             <div class="d-flex justify-content-center mb-3">
                 <audio controls preload="metadata" class="w-100">
                     <source src="<?php echo $model->getMinusLink()?>">
                 </audio>
             </div>
             <div class="justify-content-end d-flex">
                 <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
             </div>
         </div>
         <div class="col-sm-4">

             <?= $form->field($model, 'music_name')->textInput(['rows' => 2]) ?>

             <?= $form->field($model, 'author_name')->textInput(['rows' => 2]) ?>

             <?= $form->field($model, 'title', [
                'inputOptions' => ['data-role' => 'tagsinput']
             ])->textInput(['maxlength' => true]) ?>

             <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

             <?= $form->field($model, 'lyrics')->textarea(['rows' => 5]) ?>

             <?= $form->field($model, 'status')->dropDownList($model->getStatusLabel()) ?>

         </div>

     </div>

    <?php ActiveForm::end(); ?>

</div>
