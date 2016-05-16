<?php
namespace app\models;
use Yii;
 
 class Generator 
{
 	public $expiration_date;
	public $known_codes;
	public $arr;
    private $model;
 
 	
	protected function __construct() 
	{
		$this->arr=[];
		$this-> known_codes=[];
	} 
	
	

		static	function generateFromModel($model)
	{
		 $instance = new self();
		 $instance->model = $model; 
		 $instance->prepareExistCodes();
       
				while(count($instance->arr)<$instance->model->quantity)
			{
				do {
				$unique = $instance-> generete_code($instance->model->sn_size,10);
				} while (in_array($unique,$instance->arr) || in_array($unique,$instance->known_codes) );
				$instance->arr[]=$unique; 
			}
	  
		return   $instance ;
	}
	
	/*
	* Function save codes to DB
	*/
	public	function save()
	{
	
	$odd = function ($var) {
	 $code = explode("-", $var);  
		return [$code[0],$code[1],$this->model->expiration_date,date("Y-m-d H:i:s"),$this->model->bonus] ;
	 };
		 
	 $db = Yii::$app->db;
	 $sql =$db->queryBuilder->batchInsert('cards', ['series', 'number','expiration_date','time_generated','bonus'], array_map($odd,$this->arr));
	 $db->createCommand($sql)->execute();
	 return true;
	}
	
	
 
	 /*
	 *   Prepare exists codes from DB in normal format
	 */
	public function prepareExistCodes()
	{
	$odd = function ($var) {
	return  $var['series']."-".$var['number'];
	};
	$this-> known_codes =  array_map($odd, $this->findAllModels());
	}
		 static function generate_random_letters($length) {
	   $letters = '';
	  for ($i = 0; $i < $length; $i++) {
		$letters .= chr(rand(ord('A'), ord('B')));
	  }
	  return $letters;
	}
 
	static function generate_random_nums($length) {
	  $nums = '';
	  for ($i = 0; $i < $length; $i++) {
			 $nums .= mt_rand(0,9);
	  }
	  return $nums;
	}

	 private function generete_code($letters,$nums)
	{
		return self::generate_random_letters($letters)."-".self::generate_random_nums($nums); 
	}


 	/*
	*  Function return  exists codes from DB  
	*/
   public  function findAllModels()
    {
		 $rows = (new \yii\db\Query())
		->select(['series','number'])
		->from('cards')
		->where(['CHAR_LENGTH(`series`)' => $this->model->sn_size])
		->all();
 
		return $rows;
    }
	
	
  
}
