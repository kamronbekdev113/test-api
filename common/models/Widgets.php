<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "widgets".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $created_at
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property int|null $status
 * @property string|null $title
 * @property int|null $type
 * @property string|null $updated_at
 * @property Items $items
 */
class Widgets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widgets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['lang', 'status', 'type'], 'integer'],
            [['alias', 'lang_hash', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'created_at' => 'Created At',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'status' => 'Status',
            'title' => 'Title',
            'type' => 'Type',
            'updated_at' => 'Updated At',
        ];
    }

    public function getItems()
    {
        return $this->hasMany(Items::class,['widget_id'=>'id']);
    }
}
