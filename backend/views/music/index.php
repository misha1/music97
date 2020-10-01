<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Музыки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'music_name',
                'content' => function($model){
                    return $this->render('_music_item', ['model' => $model]);
                }
            ],
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
                }
            ],
            //'created_by',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'delete' => function ($url){
                            return Html::a('Удалить', $url, [
                                    'data-method' => 'post',
                                    'data-confirm' => 'Вы уверены?'
                            ]);
                        }
                ]

            ],
        ],
    ]); ?>



</div>
