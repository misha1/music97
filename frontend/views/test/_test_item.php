<?php
/** @var $model \common\models\Test*/
?>

<div class="card m-4 shadow" style="width: 18rem;">
    <img src="<?php echo $model->getThumbnailTestLink()?>" class="card-img-top" alt="картинка теста">
    <div class="card-body">
        <h5 class="card-title"><?php echo $model->test_name?></h5>
        <p class="card-text"><?php echo $model->description?></p>
    </div>
    <a href="#" class="btn btn-primary">Начать тест</a>
</div>
