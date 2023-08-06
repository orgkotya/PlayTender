<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php
$this->title = isset($model->id)? 'Update purchase': 'Create purchase';
$this->params['breadcrumbs'][] = ['label' => 'purchase', 'url' => ['/admin/appellation']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin() ?>
<?= /** @var \app\models\app\Purchase $model */
$form->field($model, 'name');?>
<?=$form->field($model, 'description');?>
<?=$form->field($model, 'budget');?>
<?=$form->field($model, 'status')->dropDownList(\app\models\app\Purchase::itemAlias(),['prompt'=>'not selected','disabled'=> $model->status===\app\models\app\Purchase::STATUS_ACTIVE]) ?>

<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>



