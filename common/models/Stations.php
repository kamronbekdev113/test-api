<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "stations".
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property string|null $email
 * @property string|null $fax
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property string|null $lat
 * @property string|null $long
 * @property string|null $phone
 * @property int|null $region_id
 * @property int|null $status
 * @property string|null $title
 * @property string|null $updated_at
 *
 * @property File $file
 * @property Region $region
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stations';
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
            [['file_id', 'lang', 'region_id', 'status'], 'integer'],
            [['address', 'email', 'fax', 'lang_hash', 'lat', 'long', 'phone', 'title'], 'string', 'max' => 255],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'email' => 'Email',
            'fax' => 'Fax',
            'file_id' => 'File ID',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'lat' => 'Lat',
            'long' => 'Long',
            'phone' => 'Phone',
            'region_id' => 'Region ID',
            'status' => 'Status',
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

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasMany(Region::class, ['id' => 'region_id']);
    }
}
