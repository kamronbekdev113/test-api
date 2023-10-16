<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $description
 * @property string|null $domain
 * @property string|null $ext
 * @property string|null $file
 * @property string|null $folder
 * @property int|null $folder_id
 * @property string|null $path
 * @property float|null $size
 * @property string|null $slug
 * @property string|null $thumbnails
 * @property string|null $title
 * @property string|null $updated_at
 * @property int|null $user_id
 *
 * @property Banners[] $banners
 * @property History[] $histories
 * @property Items[] $items
 * @property Posts[] $posts
 * @property Settings[] $settings
 * @property Stations[] $stations
 * @property UsefulLinks[] $usefulLinks
 * @property User $user
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'thumbnails', 'updated_at'], 'safe'],
            [['folder_id', 'user_id'], 'integer'],
            [['size'], 'number'],
            [['description', 'domain', 'ext', 'file', 'folder', 'path', 'slug', 'title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'description' => 'Description',
            'domain' => 'Domain',
            'ext' => 'Ext',
            'file' => 'File',
            'folder' => 'Folder',
            'folder_id' => 'Folder ID',
            'path' => 'Path',
            'size' => 'Size',
            'slug' => 'Slug',
            'thumbnails' => 'Thumbnails',
            'title' => 'Title',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Banners]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBanners()
    {
        return $this->hasMany(Banners::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Settings::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[Stations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(Stations::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[UsefulLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsefulLinks()
    {
        return $this->hasMany(UsefulLinks::class, ['file_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
