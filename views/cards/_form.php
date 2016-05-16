<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'series')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'time_generated')->textInput() ?>

    <?= $form->field($model, 'time_used')->textInput() ?>

    <?= $form->field($model, 'used')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'expiration_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
