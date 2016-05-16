<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
 
/* @var $this yii\web\View */
/* @var $model app\models\Cards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'quantity')->textInput(['maxlength'=>10,'style'=>'width:100px']) ?>
    <?= $form->field($model, 'sn_size')->textInput(['maxlength'=>10,'style'=>'width:100px']) ?>
 
 <?= $form->field($model, 'bonus')->textInput(['maxlength'=>10,'style'=>'width:100px']) ?>
 


<?= $form->field($model, 'expiration_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Expiration','style'=>'width:170px'],
                'removeButton' => false,
                'pluginOptions' => [
                    'autoclose' => true,
					'format' => 'yyyy-mm-dd hh:ii:ss'
                ]
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton( 'Generate' , ['class' =>   'btn btn-success'  ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
