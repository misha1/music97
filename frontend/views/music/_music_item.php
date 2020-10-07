<?php

/** @var $model \common\models\Music */

use yii\helpers\Url;
?>


<div class="card m-2" style="max-width: 500px;">
  <div class="row no-gutters">
      <div class="col-md-4">
          <a href="<?php echo Url::to(['music/view', 'id' => $model->music_id])?>">
          <img src="<?php echo $model->getThumbnailLink()?>" class="card-img" alt="Портрет автора" height="220px">
          </a>
      </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">♪ <?php echo $model->music_name?></h5>
        <h6 class="card-author"><?php echo $model->author_name?></h6>
        <p class="card-text"><?php echo \yii\helpers\StringHelper::truncateWords($model->description, 10)?></p>
        <p class="card-text"><small class="text-muted">Обновлено: <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at)?></small></p>
      </div>
    </div>
  </div>
</div>




