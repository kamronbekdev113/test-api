<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property string|null $description
 * @property int|null $file_id
 * @property int|null $parent_id
 * @property string|null $secondary
 * @property int|null $sort
 * @property int|null $status
 * @property string|null $title
 * @property string|null $updated_at
 * @property int|null $widget_id
 *
 * @property File $file
 * @property Widgets $widget
 */
class Items extends \yii\db\ActiveRecord
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
                'value' => new Expression('NOW()'),
            ],

        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['file_id', 'parent_id', 'sort', 'status', 'widget_id'], 'integer'],
            [['description', 'secondary', 'title'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
            [['widget_id'], 'exist', 'skipOnError' => true, 'targetClass' => Widgets::class, 'targetAttribute' => ['widget_id' => 'id']],
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
            'description' => 'Description',
            'file_id' => 'File ID',
            'parent_id' => 'Parent ID',
            'secondary' => 'Secondary',
            'sort' => 'Sort',
            'status' => 'Status',
            'title' => 'Title',
            'updated_at' => 'Updated At',
            'widget_id' => 'Widget ID',
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

    /**
     * Gets query for [[Widget]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWidget()
    {
        return $this->hasOne(Widgets::class, ['id' => 'widget_id']);
    }
}
