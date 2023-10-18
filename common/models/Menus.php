<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property int|null $status
 * @property string|null $title
 * @property string|null $translations
 * @property string|null $type
 * @property string|null $updated_at
 *
 * @property MenuItems[] $menuItems
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus';
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
            [['deleted_at', 'created_at', 'translations', 'updated_at'], 'safe'],
            [['lang', 'status'], 'integer'],
            [['alias', 'lang_hash', 'title', 'type'], 'string', 'max' => 255],
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
            'deleted_at' => 'Deleted At',
            'created_at' => 'Created At',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'status' => 'Status',
            'title' => 'Title',
            'translations' => 'Translations',
            'type' => 'Type',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[MenuItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItems()
    {
        return $this->hasMany(MenuItems::class, ['menu_id' => 'id']);
    }
}
