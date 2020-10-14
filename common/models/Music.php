<?php

namespace common\models;

use Imagine\Gd\Image;
use Imagine\Image\Box;
use phpDocumentor\Reflection\File;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%music}}".
 *
 * @property string $music_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $lyrics
 * @property string $music_name
 * @property string|null $author_name
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $has_thumbnail
 * @property int|null $has_minus
 *
 * @property User $createdBy
 */
class Music extends \yii\db\ActiveRecord
{
    //Статус публикации
    const STATUS_UNLISTED =0;
    const STATUS_PUBLISHED =1;

    /** @var  UploadedFile*/
    public $music;
    /** @var  UploadedFile*/
    public $thumbnail;
    /**
    /** @var  UploadedFile*/
    public $minus;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%music}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
                [
                    'class'=> BlameableBehavior::class,
                    'updatedByAttribute' => false
                ]
        ]; // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_id', 'music_name'], 'required'],
            [['description', 'lyrics', 'music_name', 'author_name'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by','has_thumbnail','has_minus'], 'integer'],
            [['music_id'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 512],
            [['music_id'], 'unique'],
            ['has_thumbnail', 'default', 'value' => 0],
            ['has_minus', 'default', 'value' => 0],
            ['thumbnail', 'image', 'minWidth' => 150],
            ['music', 'file', 'extensions' => ['mp3']],
            ['minus', 'file', 'extensions' => ['mp3']],
            ['status', 'default', 'value' => self::STATUS_UNLISTED],  //Статус публикации = 0
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'music_id' => 'Music ID',
            'title' => 'Жанр',
            'description' => 'Описание',
            'lyrics' => 'Слова',
            'music_name' => 'Названия',
            'author_name' => 'Автор',
            'status' => 'Статус',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'created_by' => 'Создатель',
        ];
    }

    public function getStatusLabel()
    {
        return [
            self::STATUS_UNLISTED => 'Скрыто',
            self::STATUS_PUBLISHED => 'Опубликованно',
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
     * {@inheritdoc}
     * @return \common\models\query\MusicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MusicQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $isInsert= $this->isNewRecord;
        if($isInsert){
            $this->music_id = Yii::$app->security->generateRandomString(8);
            $this->music_name = $this->music->name;

        }

        //Картинка
        if($this->thumbnail){
            $this->has_thumbnail = 1;
        }
        //Минусовка
        if($this->minus){
            $this->has_minus= 1;
        }



        $saved = parent::save($runValidation, $attributeNames); // TODO: Change the autogenerated stub
        if (!$saved){
            return false;
        }
        if($isInsert){
            $musicPath = Yii::getAlias('@frontend/web/storage/musics/'.$this->music_id.'.mp3');
            if(!is_dir(dirname($musicPath))){
                FileHelper::createDirectory(dirname($musicPath));
            }
            $this->music->saveAs($musicPath);
        }

        if($this->thumbnail){
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/'.$this->music_id.'.jpg');
            if(!is_dir(dirname($thumbnailPath))){
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnail->saveAs($thumbnailPath);
        }

        if($this->minus){
            $minusPath = Yii::getAlias('@frontend/web/storage/minus/'.$this->music_id.'.mp3');
            if(!is_dir(dirname($minusPath))){
                FileHelper::createDirectory(dirname($minusPath));
            }
            $this->minus->saveAs($minusPath);
        }

        return true;
    }
    public function getMusicLink()
    {
        return Yii::$app->params['frontendUrl'].'storage/musics/'.$this->music_id.'.mp3';
    }
    public function getThumbnailLink()
    {
        return $this->has_thumbnail ?
            Yii::$app->params['frontendUrl'].'storage/thumbs/'.$this->music_id.'.jpg' : '';
    }
    public function getMinusLink()
    {
        return $this->has_minus ?
            Yii::$app->params['frontendUrl'].'storage/minus/'.$this->music_id.'.mp3' : '';
    }

    public function afterDelete()
    {
        parent::afterDelete(); // TODO: Change the autogenerated stub
        $musicPath = Yii::getAlias('@frontend/web/storage/musics/'.$this->music_id.'.mp3');
        unlink($musicPath);
        $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/'.$this->music_id.'.jpg');
        if(file_exists($thumbnailPath)){
            unlink($thumbnailPath);
        }

        $minusPath = Yii::getAlias('@frontend/web/storage/minus/'.$this->music_id.'.mp3');
        if(file_exists($minusPath)){
            unlink($minusPath);
        }
    }
}
