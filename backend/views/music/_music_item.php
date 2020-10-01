<?php

/** @var $model \common\models\Music */
use yii\helpers\Url;

?>

<a href="<?php echo Url::to(['/music/update', 'id' => $model->music_id])?>">
    <?php echo $model->music_name?>
</a>
