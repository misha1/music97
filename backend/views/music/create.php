<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Music */

$this->title = 'Музыка';
$this->params['breadcrumbs'][] = ['label' => 'Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row justify-content-center mb-5">
    <div class="col-md-4 p-0 m-3">
        <a href="#">
            <div class="card bg-light text-dark">
                <img src="https://fsd.multiurok.ru/html/2020/05/03/s_5eaea1c52e593/img0.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h5 class="card-title text-danger">Тест</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 p-0 m-3">
        <a href="<?php echo \yii\helpers\Url::to(['/music/music_lesson'])?>">
            <div class="card bg-light text-dark">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/03/72/71/9057b96ce3573a3.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title text-danger">Пения</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 p-0 m-3">
        <a href="#">
            <div class="card bg-light text-dark">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/03/72/71/9057b96ce3573a3.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h5 class="card-title text-danger">Урок 3</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 p-0 m-3">
        <a href="#">
            <div class="card bg-light text-dark">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/03/72/71/9057b96ce3573a3.jpg" class="card-img" alt="..." >
                <div class="card-img-overlay">
                    <h5 class="card-title text-danger">Урок 4</h5>
                </div>
            </div>
        </a>
    </div>
</div>