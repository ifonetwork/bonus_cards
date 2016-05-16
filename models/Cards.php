<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property string $series
 * @property integer $number
 * @property string $time_generated
 * @property string $time_used
 * @property integer $used
 * @property integer $active
 * @property string $expiration_date
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series', 'number', 'time_generated', 'expiration_date','bonus'], 'required'],
            [['number', 'used', 'active','bonus'], 'integer'],
            [['time_generated', 'time_used', 'expiration_date'], 'safe'],
            [['series'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series' => 'Series',
            'number' => 'Number',
            'time_generated' => 'Generated (Time)',
            'time_used' => 'Used (Date)',
            'used' => 'Used',
            'active' => 'Active',
            'expiration_date' => 'Expiration (Date)',
			'bonus' =>'Bonus (USD)',
        ];
    }
}
