<?php
?>

<aside class="shadow ">
        <?php echo \yii\bootstrap4\Nav::widget([
            'options' => [
                'class' => 'd-flex flex-column nav-pills'
            ],
            'items' => [
                [
                    'label' => 'Главная',
                    'url' => ['/site/index']
                ],
                [
                    'label' => 'Музыки',
                    'url' => ['/music/index']
                ]
            ]
        ]) ?>
</aside>