<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_like}}".
 *
 * @property int $id
 * @property string $video_id
 * @property int|null $user_id
 * @property int|null $type
 * @property int|null $created_at
 */
class VideoLike extends \yii\db\ActiveRecord
{
	const TYPE_LIKE = 1;
	const TYPE_DISLIKE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video_like}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['user_id', 'type', 'created_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoLikeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoLikeQuery(get_called_class());
    }
}
