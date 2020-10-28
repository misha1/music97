<?php

use common\models\Answer;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestQuestion */
/* @var $AnswerModel common\models\Answer */

$this->params['breadcrumbs'][] = ['label' => 'Test Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'AnswerModel' => (empty($AnswerModel)) ? [new Answer] : $AnswerModel
    ]) ?>

</div>
