<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "banners".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property string|null $link
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $target
 * @property string|null $title
 * @property string|null $updated_at
 *
 * @property File $file
 */
class Banners extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['file_id', 'lang', 'sort', 'status', 'target'], 'integer'],
            [['lang_hash', 'link', 'title'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
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
            'deleted_at' => 'Deleted At',
            'file_id' => 'File ID',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'link' => 'Link',
            'sort' => 'Sort',
            'status' => 'Status',
            'target' => 'Target',
            'title' => 'Title',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasMany(File::class, ['id' => 'file_id']);
    }
}
