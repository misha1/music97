<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Test */
/* @var $modelQuestion common\models\TestQuestion */


$this->title = 'Добавить Тест';
$this->params['breadcrumbs'][] = ['label' => 'Тест', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
