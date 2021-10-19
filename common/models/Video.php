<?php

namespace common\models;

use Imagine\Image\Box;
use yii\imagine\Image;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property string $video_id
 * @property string $title
 * @property string|null $description
 * @property string|null $tags
 * @property int|null $status
 * @property int|null $has_thumbnail
 * @property string|null $video_name
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 */
class Video extends \yii\db\ActiveRecord
{

    const STATUS_UNLISTED = 0; //constantes do app
    const STATUS_PUBLISHED = 1;
    /**
     * @var \yii\web\UploadedFile;
     * 
     */
    public $video;

    /**
     * @var \yii\web\UploadedFile;
     * 
     */
    public $thumbnail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    public function behaviors() //configuracoes para acesso a atributos como updated_at, created_at
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['description'], 'string'],
            [['status', 'has_thumbnail', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['title', 'tags'], 'string', 'max' => 512],
            [['video_name'], 'string', 'max' => 521],
            [['video_id'], 'unique'],
            ['has_thumbnail', 'default', 'value' => 0],
            ['status', 'default', 'value' => self::STATUS_UNLISTED],
            ['thumbnail', 'image', 'minWidth' => 1280],
            ['video', 'file', 'extensions' => ['mp4']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'title' => 'Title',
            'description' => 'Description',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'video_name' => 'Video Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'thumbnail' => 'Thumbnail',
        ];
    }

    public function getStatusLabels()
    {
        return [
            self::STATUS_UNLISTED => 'Unlisted',
            self::STATUS_PUBLISHED => 'Published',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

	/**
	 * method to return number of views from a video
	 * @return \yii\db\ActiveQuery
	 */
	public function getViews(){
		return $this->hasMany(VideoView::class, ['video_id' =>'video_id']);
	}

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoQuery(get_called_class());
    }

    /**
     * Method to save de uploaded videos on the specified path
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        $isInsert = $this->isNewRecord; //verifica se e um upload
        if ($isInsert) {
            $this->video_id = Yii::$app->security->generateRandomString(8);
            $this->title = $this->video->name;
            $this->video_name = $this->video->name;
        }

        if ($this->thumbnail) {
            $this->has_thumbnail = 1;
        }
        $saved =  parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }

        if ($isInsert) {
            $videoPath = Yii::getAlias('@frontend/web/storage/videos/' . $this->video_id . '.mp4'); // indicacao do directorio
            if (!is_dir(dirname($videoPath))) { // verifica se o directorio indicado existe, caso nao cria
                FileHelper::createDirectory(dirname($videoPath));
            }
            $this->video->saveAs($videoPath);
        }

        if ($this->thumbnail) {
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/' . $this->video_id . '.png'); // indicacao do directorio
            if (!is_dir(dirname($thumbnailPath))) { // verifica se o directorio indicado existe, caso nao cria
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnail->saveAs($thumbnailPath);
            Image::getImagine()
                ->open($thumbnailPath)
                ->thumbnail(new Box(1280, 1280))
                ->save();
        }

        return true;
    }

    /**
     * @return get the link of the video and show on the layout
     */
    public function getVideoLink()
    {
        return Yii::$app->params['frontendUrl'] . 'storage/videos/' . $this->video_id . '.mp4';
    }

    /**
     * @return get the link of the thumbnail and show on the layout
     */
    public function getThumbnailLink()
    {
        return $this->has_thumbnail ?
            Yii::$app->params['frontendUrl'] . 'storage/thumbs/' . $this->video_id . '.jpg'
            : '';
    }

    /**
     * deletar os registos na aplicacao depois que forem removidos pelo utilizador
     */
    public function afterDelete()
    {
        parent::afterDelete();

        $videoPath = Yii::getAlias('@frontend/web/storage/videos/' . $this->video_id . '.mp4'); // indicacao do directorio
        unlink($videoPath);
        $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/' . $this->video_id . '.png'); // indicacao do directorio
        if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }
    }
}
