<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property int|null $code
 * @property int|null $country_id
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property string|null $name_en
 * @property string|null $name_oz
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property int|null $status
 * @property string|null $updated_at
 *
 * @property Stations[] $stations
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
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
            [['code', 'country_id', 'status'], 'integer'],
            [['created_at', 'deleted_at', 'updated_at'], 'safe'],
            [['name_en', 'name_oz', 'name_ru', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'country_id' => 'Country ID',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'name_en' => 'Name En',
            'name_oz' => 'Name Oz',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
            'status' => 'Status',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Stations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(Stations::class, ['region_id' => 'id']);
    }
}
