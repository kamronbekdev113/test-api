<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "useful_links".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property string|null $link
 * @property string|null $name_en
 * @property string|null $name_oz
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property int|null $sort
 * @property int|null $status
 * @property string|null $updated_at
 *
 * @property File $file
 */
class UsefulLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'useful_links';
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
            [['lang_hash', 'link', 'name_en', 'name_oz', 'name_ru', 'name_uz'], 'string', 'max' => 255],
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
            'name_en' => 'Name En',
            'name_oz' => 'Name Oz',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
            'sort' => 'Sort',
            'status' => 'Status',
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
