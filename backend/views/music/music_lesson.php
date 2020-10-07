<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Music */

$this->title = 'Добавить Музыку';
$this->params['breadcrumbs'][] = ['label' => 'Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex flex-column justify-content-center align-items-center">

        <div class="upload-icon">
            <i class="fas fa-upload"></i>
        </div>
        <br>

        <p class="m-0">Нажмите кнопку ниже, чтобы выбрать файл на компьютере.
        <p>

        <p class="text-muted">Пока вы не опубликуете музыку, доступ к ним будет ограничен.</p>

        <?php $form = \yii\bootstrap4\ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]) ?>

        <?php echo $form->errorSummary($model) ?>

        <button class="btn btn-primary btn-file">
            Выбрать файл
            <input type="file" id="musicFile" name="music">
        </button>
        <?php \yii\bootstrap4\ActiveForm::end() ?>
    </div>

</div>
