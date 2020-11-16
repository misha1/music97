<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Music */
$this->title = $model->music_name;
$this->params['breadcrumbs'][] = ['label' => 'Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="music-view w-50 ">
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->music_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->music_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'music_name:ntext',
                'author_name:ntext',
                'title',
                'description:ntext',
                'lyrics:ntext',
                'created_at:datetime',
                'updated_at:datetime',


            ],
        ]) ?>
    </p>

</div>
