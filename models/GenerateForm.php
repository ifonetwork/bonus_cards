<?php

namespace app\models;
use Yii;
use yii\base\Model;

class GenerateForm extends Model
{
    public $quantity=10;
    public $expiration_date;
    public $sn_size=2;
	public $bonus;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['quantity', 'expiration_date','bonus'], 'required'],
			[['quantity','bonus'], 'integer', 'max' => 1000],
			[['sn_size'], 'integer', 'max' => 5],
			['sn_size', 'default', 'value' => '2'],
 
           
        ];
    }
	
	
	   public function attributeLabels()
    {
        return [
            'quantity' => 'Number of codes',
            'sn_size' => 'Number of series characters  (2 by default)',
            'expiration_date' => 'Expiration (Date)',
			'bonus' => 'Bonus (USD)',
            ];
    }

 
  
}
