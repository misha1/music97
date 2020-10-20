<?php

/** @var $model \common\models\test */
use yii\helpers\Url;

?>

<a href="<?php echo Url::to(['/test/update', 'id' => $model->test_id])?>">
    <?php echo $model->test_name?>
</a>
