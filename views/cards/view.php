<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cards */

$this->title = "Bonus card ".$model->series."-".$model->number;
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cards-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
  
		
		 <?= Html::a($model->active ?  'Disable': 'Enable', ['disable', 'id' => $model->id], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => $model->active ?  'Are you sure want to disable card?': 'Are you sure want to enable card?',
                'method' => 'post',
            ],
        ]) ?>
		
		
		
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id',
		[
             'attribute' => 'Full number',
             'format'=>'raw',
              'value'=> $model->series.'-'.$model->number,
        ],
		
            'series',
            'number',
            'time_generated',
            'time_used',
       
			
		[
             'attribute' => 'used',
             'format'=>'raw',
              'value'=> $model->used ?  'Used': 'Not used'  ,
        ],
		
 
			[
             'attribute' => 'active',
             'format'=>'raw',
             'value'=> $model->active ?  'Active': 'Not Active'  ,
        ],
 
			'bonus',
    
            'expiration_date',
        ],
    ]) ?>

</div>
