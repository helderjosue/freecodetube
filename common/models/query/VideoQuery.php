<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Video]].
 *
 * @see \common\models\Video
 */
use common\models\Video;
class VideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Video[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Video|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param $userId
     * @return mixed
     * function to return the creator of the video from the database
     */
    public function creator($userId){

        return $this->andWhere(['created_by' => $userId]);
    }

    /**
     * @return mixed
     * function to sort the videos from the latest to oldest
     */
    public function latest(){
        return $this->orderBy(['created_at' => SORT_DESC]);
    }

    public function published()
    {
        return $this->andWhere(['status' => Video::STATUS_PUBLISHED]);
    }
}
