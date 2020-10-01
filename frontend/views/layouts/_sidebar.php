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
                    'url' => ['/music/index']
                ],
                [
                    'label' => 'Оценки',
                    'url' => ['/music/appraisals']
                ],
                [
                    'label' => 'Рейтинг',
                    'url' => ['/music/rating']
                ]
            ]
        ]) ?>
</aside>