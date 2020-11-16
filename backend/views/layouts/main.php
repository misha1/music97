<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php')
?>
    <main class="d-flex">
        <?php echo $this->render('_sidebar')?>
        <div class="content-wrapper p-3">
            <?= Alert::widget() ?>
            <?php
            echo Breadcrumbs::widget([
                  'homeLink' => [
                                  'label' => Yii::t('yii', 'Главная'),
                                  'url' => Yii::$app->homeUrl,
                             ],
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
               ])
            ?>
            <?= $content ?>
        </div>
    </main>
<?php $this->endContent()?>


