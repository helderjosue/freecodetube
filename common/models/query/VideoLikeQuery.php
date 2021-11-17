<?php

namespace common\models\query;
use common\models\VideoLike;
/**
 * This is the ActiveQuery class for [[\common\models\VideoLike]].
 *
 * @see \common\models\VideoLike
 */
class VideoLikeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return common\models\VideoLike[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return common\models\VideoLike|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

	/**
	 * gets the videos liked by user
	 * @param $userId
	 * @param $videoId
	 * @return mixed
	 */
	public function userIdVideoId($userId, $videoId)
	{
		return $this->andWhere([
		'video_id' =>$videoId,
		'user_id' =>$userId])
		->one();
	}

	/**
	 * Gets the videos with value of liked
	 * @return mixed
	 */
	public function liked(){

		return $this->andWhere(['type' => VideoLike::TYPE_LIKE]);
	}

	/**
	 * Gets the videos with value of disliked
	 * @return mixed
	 */
	public function disliked(){

		return $this->andWhere(['type' => VideoLike::TYPE_DISLIKE]);
	}


}
