<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\CardsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="cards-search">
    <?php $form = ActiveForm::begin([
		 
        'action' => ['index'],
        'method' => 'get',
		  'options' => [ 'class' => 'form-inline' ],
    ]); ?>

 <div class="form-group">
     <label class="sr-only" for="example">Series</label>
     <?php echo $form->field($model, 'series', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('text', ['placeholder' => "Serials",'style'=>'width:100px'])->label(false); ?>
</div>

 <div class="form-group">
     <label class="sr-only" for="example">Number</label>
     <?php echo $form->field($model, 'number', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('text', ['placeholder' => "Number"])->label(false); ?>
</div>


 <div class="form-group">
     <label class="sr-only" for="example">Bonus</label>
     <?php echo $form->field($model, 'bonus', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('text', ['placeholder' => "Bonus",'style'=>'width:100px'])->label(false); ?>
</div>


  <div class="form-group">
     
     <div class="form-group field-cardssearch-searchbtn">

 <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>

<div class="help-block"></div>
</div></div>

    <?php ActiveForm::end(); ?>

</div>


 