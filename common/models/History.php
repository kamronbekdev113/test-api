<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property string|null $anons
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property string|null $description
 * @property string|null $documents
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property string|null $slug
 * @property int|null $status
 * @property string|null $title
 * @property int|null $type
 * @property string|null $updated_at
 *
 * @property File $file
 */
class History extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => yii\behaviors\TimestampBehavior::class,
                'value' => new yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['file_id', 'lang', 'status', 'type'], 'integer'],
            [['anons', 'content', 'description', 'documents', 'lang_hash', 'slug', 'title'], 'string', 'max' => 255],
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
            'anons' => 'Anons',
            'content' => 'Content',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'description' => 'Description',
            'documents' => 'Documents',
            'file_id' => 'File ID',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'slug' => 'Slug',
            'status' => 'Status',
            'title' => 'Title',
            'type' => 'Type',
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
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }
}
