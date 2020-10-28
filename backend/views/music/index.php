<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['music_lesson'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'attribute' => 'music_name',
            'author_name',
            'title',
//            'description:ntext',
//            'lyrics:ntext',
            //'status',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'status',
                'content'  =>  function($model){
                    return $model->getStatusLabel()[$model->status];
                },
                'filter' => [0 => 'Скрыто', 1 => 'Опубликованно']
            ],
            //'created_by',

            ['class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
