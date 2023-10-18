<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $alias
 * @property string|null $deleted_at
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property string|null $link
 * @property string|null $name
 * @property string|null $slug
 * @property int|null $sort
 * @property int|null $status
 * @property string|null $updated_at
 * @property string|null $value
 *
 * @property File $file
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }



    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['file_id', 'lang', 'sort', 'status'], 'integer'],
            [['alias', 'lang_hash', 'link', 'name', 'slug', 'value'], 'string', 'max' => 255],
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
            'alias' => 'Alias',
            'deleted_at' => 'Deleted At',
            'file_id' => 'File ID',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'link' => 'Link',
            'name' => 'Name',
            'slug' => 'Slug',
            'sort' => 'Sort',
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'value' => 'Value',
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
