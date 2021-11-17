<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use common\models\Video;
use yii\web\NotFoundHttpException;
use common\models\VideoView;
use common\models\VideoLike;

class VideoController extends Controller
{

	public function behaviors(){
		return [
			'access' =>[
				'class' =>AccessControl::class,
				'only' => ['like','dislike'],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
					]
				]
			],
			'verb' =>[
				'class' => VerbFilter::class,
				'actions' => [
					'like' => ['post'],
					'dislike' => ['post'],
				]
			]
		];
	}
	/**
	 * @return mixed
	 */
    public function actionIndex(){

        $dataProvider = new ActiveDataProvider([
            'query' =>Video::find()->published()->latest()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }


	/**
	 * @throws NotFoundHttpException
	 */
	public function actionView($id){

//		$video = Video::findOne($id); find any video by id
//		$video = Video::find->published()->andWhere($id); // find videos by id and are published

		$this->layout = 'auth';
		$video = $this->findVideo($id);

		$videoView = new VideoView();
		$videoView->video_id = $id;
		$videoView->user_id = \Yii::$app->user->id;
		$videoView->created_at = time();
		$videoView->save();

		return $this->render('view',['model' => $video]);
	}


	/**
	 * @throws NotFoundHttpException
	 */
	public function actionLike($id){

//		$video = Video::findOne($id); find any video by id
//		$video = Video::find->published()->andWhere($id); // find videos by id and are published

		$this->layout = 'auth';
		$video = $this->findVideo($id);


		$userId = \Yii::$app->user->id;

//		$videoLikeDislike = VideoLike::find() // check if the video has been liked by this users
//			->userIdVideoId($userId,$id)
//			->one();
		$videoLikeDislike = VideoLike::find() // check if the video has been liked by this users
			->andWhere([
			'video_id' =>$id,
			'user_id' =>$userId
		])->one();


		if(!$videoLikeDislike) {//likes the video if the user didnt like this video before
//			$this->saveLikeDislike($id,$userId,VideoLike::TYPE_LIKE);
			$videoLikeDislike = new VideoLike();
			$videoLikeDislike->video_id = $id;
			$videoLikeDislike->user_id = $userId;
			$videoLikeDislike->type =VideoLike::TYPE_LIKE;
			$videoLikeDislike->created_at = time();
			$videoLikeDislike->save();
		}elseif ($videoLikeDislike->type == VideoLike::TYPE_DISLIKE){ //deletes the videoLike if the video has disliike value
			$videoLikeDislike->delete();
		}else{
			$videoLikeDislike->delete();
//			$this->saveLikeDislike($id,$userId,VideoLike::TYPE_LIKE);
			$videoLikeDislike = new VideoLike();
			$videoLikeDislike->video_id = $id;
			$videoLikeDislike->user_id = $userId;
			$videoLikeDislike->type =VideoLike::TYPE_LIKE;
			$videoLikeDislike->created_at = time();
			$videoLikeDislike->save();
		}



		return $this->renderAjax('_buttons', [
			'model' =>$video
		]); // returns only the buttons of the view
	}

	/**
	 * @throws NotFoundHttpException
	 */
	public function actionDislike($id){

//		$video = Video::findOne($id); find any video by id
//		$video = Video::find->published()->andWhere($id); // find videos by id and are published

		$this->layout = 'auth';
		$video = $this->findVideo($id);


		$userId = \Yii::$app->user->id;

//		$videoLikeDislike = VideoLike::find() // check if the video has been liked by this users
//			->userIdVideoId($userId,$id)
//			->one();
		$videoLikeDislike = VideoLike::find() // check if the video has been liked by this users
		->andWhere([
			'video_id' =>$id,
			'user_id' =>$userId
		])->one();


		if(!$videoLikeDislike) {//likes the video if the user didnt like this video before
//			$this->saveLikeDislike($id,$userId,VideoLike::TYPE_LIKE);
			$videoLikeDislike = new VideoLike();
			$videoLikeDislike->video_id = $id;
			$videoLikeDislike->user_id = $userId;
			$videoLikeDislike->type =VideoLike::TYPE_LIKE;
			$videoLikeDislike->created_at = time();
			$videoLikeDislike->save();
		}elseif ($videoLikeDislike->type == VideoLike::TYPE_DISLIKE){ //deletes the videoLike if the video has disliike value
			$videoLikeDislike->delete();
		}else{
			$videoLikeDislike->delete();
//			$this->saveLikeDislike($id,$userId,VideoLike::TYPE_LIKE);
			$videoLikeDislike = new VideoLike();
			$videoLikeDislike->video_id = $id;
			$videoLikeDislike->user_id = $userId;
			$videoLikeDislike->type =VideoLike::TYPE_LIKE;
			$videoLikeDislike->created_at = time();
			$videoLikeDislike->save();
		}



		return $this->renderAjax('_buttons', [
			'model' =>$video
		]); // returns only the buttons of the view
	}


	protected  function findVideo($id){
		$video = Video::findOne($id);
		if(!$video){
			throw new NotFoundHttpException('O video solicitado não existe');
		}

		return $video;
	}

	protected  function  saveLikeDislike($videoId, $userId, $type){
		$videoLikeDislike = new VideoLike();
		$videoLikeDislike->video_id = $videoId;
		$videoLikeDislike->user_id = $userId;
		$videoLikeDislike->type = $type;
		$videoLikeDislike->created_at = time();
		$videoLikeDislike->save();
	}
}