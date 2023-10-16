<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calls".
 *
 * @property int|null $count
 * @property int|null $ball
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'ball'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'count' => 'Count',
            'ball' => 'Ball',
        ];
    }
}
