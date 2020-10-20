<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestQuestion */

$this->title = 'Update Test Question: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
