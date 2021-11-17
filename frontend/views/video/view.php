<?php
use common\models\Video;
use yii\helpers\Url;
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
                <?php echo $model->getViews()->count() ?> Views -- <?php echo Yii::$app->formatter->asDate($model->created_at)?>
            </div>
            <div>
                <?php \yii\widgets\Pjax::begin()?>
<!--                <a href="--><?php //echo Url::to(['/video/like', 'id' => $model->video_id]) ?><!--"-->
<!--                   class="btn btn-sm btn-outline-primary" data-method = "post" data-pjax = "1">-->
<!--                    <i class="fas fa-thumbs-up"></i>155-->
<!--                </a>-->
<!--                <button class="btn btn-sm btn-outline-secundary">-->
<!--                    <i class="fas fa-thumbs-down"></i> 6-->
<!--                </button>-->
                <?php  echo $this->render('_buttons', [
                        'model' =>$model
                ]) ?>
				<?php \yii\widgets\Pjax::end()?>
            </div>
        </div>
	</div>

	<div class="col-sm-4">

	</div>
</div>
