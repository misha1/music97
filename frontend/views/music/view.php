<?php
/** @var $model \common\models\Music */

use yii\helpers\Html;

\frontend\assets\VoiceAsset::register($this)
?>


<div class="row mt-5">
    <div class="col-sm-3 ml-5">
        <div class="d-flex justify-content-center mb-3">
            <img class="shadow-lg" src="<?php echo $model->getThumbnailLink()?>" alt="Портрет Автора" width="250" height="300">
        </div>
        <div class="mb-3">Песня: <?php echo $model->music_name?> ♪</div>
        <div class="d-flex justify-content-center mb-3">
            <audio controls preload="metadata" class="w-100">
                <source src="<?php echo $model->getMusicLink()?>">
            </audio>
        </div>
        <div class="mb-3">Песня: <?php echo $model->music_name?> (минус) ♪</div>
        <div class="d-flex justify-content-center mb-3">
            <audio controls preload="metadata" class="w-100">
                <source src="<?php echo $model->getMinusLink()?>">
            </audio>
        </div>
        <div class="mb-1" id="formats">Запись голоса</div>
        <div id="controls" class="mb-1">
            <button id="recordButton">Record</button>
            <button id="pauseButton" disabled>Pause</button>
            <button id="stopButton" disabled>Stop</button>
        </div>
        <p><strong>Запись:</strong></p>
        <ol id="recordingsList"></ol>

        <!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
    </div>
    <div class="col-sm-4 border-left ml-5 p-4 border-right">
        <h4 class="">♪ <?php echo $model->music_name?></h4>
        <a href="https://www.google.com/search?q=<?php echo $model->author_name?>" target="_blank"><h4 class=""><?php echo $model->author_name?></h4></a>
        <div class="text-muted mb-1"><?php echo $model->title?></div>
        <div class="mb-2"><?php echo Html::encode($model->description)?></div>
        <p class="mb-2">Текст песни:</p>
        <div class="border p-1 shadow" style="text-align: center"><?php echo nl2br($model->lyrics)?></div>

    </div>
</div>
