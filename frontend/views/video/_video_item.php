<?php

use common\models\Video;
use yii\helpers\Url;

/**
 * @var $model Video
 */
?>

<div class="card m-3" style="width: 14rem;">
    <a href="<?php echo Url::to(['/video/view', 'id' => $model->video_id])?>">
        <div class="embed-responsive embed-responsive-16by9">

            <video class="embed-responsive-item"
                   src="<?php echo $model->getVideoLink() ?>"></video>
        </div>
    </a>

    <div class="card-body p-2">
        <h6 class="card-title m-0"> <?php echo $model->title ?> </h6>
        <p class="card-text text-muted m-0"><?php echo $model->createdBy->username?></p>
        <p class="card-text text-muted m-0">150 Views -- <?php echo Yii::$app->formatter->asRelativeTime($model->created_at)?></p>

    </div>
</div>