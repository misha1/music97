<?php

/* @var $this \yii\web\View */
/* @var $content string */


use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php')
?>
    <main class="d-flex">
        <div class="content-wrapper p-3">
            <div class="row">
                <div class="col-sm-5">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </main>
</div>
<?php $this->endContent()?>


