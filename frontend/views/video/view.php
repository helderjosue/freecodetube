<?php
use common\models\Video;
/**
 * @var $model Video;
 */


?>

<div class="row">
	<div class="col-sm-8">
		<div class="embed-responsive embed-responsive-16by9 mb-3">

			<video class="embed-responsive-item"
                   src="<?php echo $model->getVideoLink() ?>" controls autoplay></video>
        </div>
        <h6><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                151 Views -- <?php echo Yii::$app->formatter->asDate($model->created_at)?>
            </div>
            <div>
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-thumbs-up"></i>155
                </button>
                <button class="btn btn-sm btn-outline-secundary">
                    <i class="fas fa-thumbs-down"></i> 6
                </button>
            </div>
        </div>
	</div>

	<div class="col-sm-4">

	</div>
</div>
