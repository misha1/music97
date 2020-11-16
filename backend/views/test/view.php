<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->title = $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->test_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->test_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить вопросы', ['/test-question/create', 'id' => $model->test_id], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'test_id',
            'test_name',
            'description:ntext',
            [                                                  // name свойство зависимой модели owner
                'label' => 'Количество вопросов',
                'value' => $model->getQuestionCount()->count(),
            ],
            'failCount',
            'successCount',
            'created_by',
            'updated_at',
            'created_at',
            'status',
            'has_thumbnail',
        ],
    ]) ?>

</div>
