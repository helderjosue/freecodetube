<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Video;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
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
		$video = Video::findOne($id);
		if(!$video){
			throw new NotFoundHttpException('O video solicitado nao existe');
		}

		return $this->render('view',['model' => $video]);
	}
}