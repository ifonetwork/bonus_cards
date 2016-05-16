<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cards */

$this->title = 'Generate Cards';
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 

<div class="cards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_generate', [
        'model' => $model,
    ]) ?>

</div>
