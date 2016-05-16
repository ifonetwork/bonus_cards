<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bonus Cards';
 

//$this->registerJsFile(Yii::$app->request->baseUrl . '/js/schedule.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<?php
if (Yii::$app->session->hasFlash("success")) {
    echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
} 
?>

 
 
	
	

<div class="cards-index">
	
    <h1><?= Html::encode($this->title) ?></h1>
	
	
			<h3>Search Form</h3>
		<?= $this->render('_search', [
			'model' => $searchModel,
		]) ?>
	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Generate Cards', ['generate'], ['class' => 'btn btn-success']) ?>
    </p>
	
	 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //    ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            
		  [
             'attribute'=>'series',
             'value'=>'series',
             'contentOptions'=>['style'=>'width: 50px;']
          ],
           [
             'attribute'=>'number',
             'value'=>'number',
             'contentOptions'=>['style'=>'width: 100px;']
          ],
            'time_generated',
			 'expiration_date',
            'time_used',
			      [
             'attribute'=>'bonus',
             'value'=>'bonus',
             'contentOptions'=>['style'=>'width: 100px;']
          ],
		
  [
            'class' => 'yii\grid\CheckboxColumn',
			'header' =>    'Active' ,
           'checkboxOptions' => function($model, $key, $index, $widget) {
				return [ "checked" => $model->active , 'disabled'=>'disable'];
				},

        ], 
		
		 [
            'class' => 'yii\grid\CheckboxColumn',
			'header' =>    'Used' ,
           'checkboxOptions' => function($model, $key, $index, $widget) {
				return [ "checked" => $model->used , 'disabled'=>'disable'];
				},

        ], 
		
		
 		           
            // 'active',
           

                ['class' => 'yii\grid\ActionColumn', 'template' => '{status}{view}{delete}  ',   'buttons' => [
                'status' => function ($url,$model) {
              
					
			return 	Html::a($model->active ?  'Disable': 'Enable', ['status',  'id' => $model->id,'page'=>Yii::$app->request->get('page')], [
            'class' => $model->active ?  'btn btn-success btn-xs statuslink': 'btn btn-warning btn-xs statuslink' ,
			 
            'data' => [
                'confirm' => $model->active ?  'Are you sure want to disable card?': 'Are you sure want to enable card?',
                'method' => 'post',
            ],
        ]);
					
					
					
                },
         
            ],],
        ],
    ]); ?>
 
</div>
