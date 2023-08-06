<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php
$this->title = isset($model->id)? 'Update appellation': 'Create appellation';
$this->params['breadcrumbs'][] = ['label' => 'appellation', 'url' => ['/admin/appellation']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>
<?= Html::a('add Purchase', ['admin/purchase/create'], ['class' => 'btn btn-info']) ?>
<?= Html::a('add unit', ['admin/unit/create'], ['class' => 'btn btn-warning']) ?>
<?php $form = ActiveForm::begin() ?>
<?= /** @var \app\models\app\Appellation $model */
$form->field($model, 'description');?>
<?=$form->field($model, 'amount');?>
<?=$form->field($model, 'unit_id')->dropDownList(\app\models\app\Unit::getUnitList(),['prompt'=>'not selected']) ?>
<?=$form->field($model, 'purchase_id')->dropDownList(\app\models\app\Purchase::getPurchasesList(),['prompt'=>'not selected']) ?>

<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>



