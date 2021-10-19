<?php
/**
 *
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

?>

<?php
    echo  \yii\widgets\ListView::widget(
            [
                    'dataProvider' => $dataProvider,
                'itemView' => '_video_item',
                'layout' => '<div class="d-flex flex-wrap">{items}</div> {pager}', //aplicar um layout para o conteudo a ser mostrado na view
                'itemOptions' => [
                    'tag' => false,
                ]
            ]
    )
?>
