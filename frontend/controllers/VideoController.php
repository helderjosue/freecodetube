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
		$videoLike = new VideoLike();
		$videoLike->video_id = $id;
		$videoLike->user_id = $userId;
		$videoLike->created_at = time();
		if($videoLike->save()){
			return "sucess";
		}

		echo '<pre>';
		var_dump($videoLike->errors);
		echo '</pre>';

		return $this->render('view',['model' => $video]);
	}


	protected  function findVideo($id){
		$video = Video::findOne($id);
		if(!$video){
			throw new NotFoundHttpException('O video solicitado nao existe');
		}

		return $video;
	}
}