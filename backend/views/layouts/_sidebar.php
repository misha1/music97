<?php
?>

<aside class="shadow ">
        <?php echo \yii\bootstrap4\Nav::widget([
            'options' => [
                'class' => 'd-flex flex-column nav-pills'
            ],
            'items' => [
                [
                    'label' => 'Новости',
                    'url' => ['/site/index']
                ],
                [
                    'label' => 'Музыка',
                    'url' => ['/music/index']
                ],
                [
                    'label' => 'Тест',
                    'url' => ['/test/index']
                ],
                [
                    'label' => 'Урок 3',
                    'url' => ['/music/lesson_3']
                ],
                [
                    'label' => 'Урок 4',
                    'url' => ['/music/lesson_4']
                ]
            ]
        ]) ?>
</aside>