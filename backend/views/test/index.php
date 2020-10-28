<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тест';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тест', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'test_name',
            'description:ntext',
            'failCount',
            'successCount',
            //'created_by',
            //'updated_by',
            'created_at:date',
            [
                'attribute' => 'status',
                'content'  =>  function($model){
                    return $model->getStatusLabel()[$model->status];
                },
                'filter' => [0 => 'Скрыто', 1 => 'Опубликованно']
            ],
            [
                'attribute' => 'Количество Вопросов',
                'content'  =>  function($model){
                    return $model->getQuestionCount()->count();
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
