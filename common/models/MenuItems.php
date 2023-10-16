<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property int $id
 * @property string|null $file
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property int|null $file_id
 * @property int|null $menu_id
 * @property int|null $menu_item_parent_id
 * @property int|null $sort
 * @property int|null $status
 * @property string|null $title
 * @property string|null $updated_at
 * @property string|null $url
 *
 * @property Menus $menu
 */
class MenuItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['file_id', 'menu_id', 'menu_item_parent_id', 'sort', 'status'], 'integer'],
            [['file', 'title', 'url'], 'string', 'max' => 255],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menus::class, 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'file_id' => 'File ID',
            'menu_id' => 'Menu ID',
            'menu_item_parent_id' => 'Menu Item Parent ID',
            'sort' => 'Sort',
            'status' => 'Status',
            'title' => 'Title',
            'updated_at' => 'Updated At',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menus::class, ['id' => 'menu_id']);
    }
}
