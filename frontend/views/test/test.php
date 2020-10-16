<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */
?>

<?php echo \yii\widgets\ListView::widget(
        [
                'dataProvider' => $dataProvider,
                'itemView' => '_test_item',
                'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
                'options' => [
                        'tag' => false
                ]
        ]
)?>