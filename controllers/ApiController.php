<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use  app\models\Mlb;
class ApiController extends ActiveController
{
    public $modelClass = 'app\models\Cards';

}