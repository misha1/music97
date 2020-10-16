<?php
?>

<aside class="shadow ">
        <?php echo \yii\bootstrap4\Nav::widget([
            'options' => [
                'class' => 'd-flex flex-column nav-pills'
            ],
            'items' => [
                [
                    'label' => 'Пения',
                    'url' => ['/music/index']
                ],
                [
                    'label' => 'Тест',
                    'url' => ['/test/test']
                ],
                [
                    'label' => 'Урок 3',
                    'url' => ['/music/lesson3']
                ],
                [
                    'label' => 'Урок 4',
                    'url' => ['/music/lesson4']
                ],
            ]
        ]) ?>
</aside>