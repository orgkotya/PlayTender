<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<?php
$this->title = 'Сreate unit of measurement';
$this->params['breadcrumbs'][] = ['label' => 'appellation', 'url' => ['appellation']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin() ?>
<?= /** @var \app\models\app\Unit $model */
$form->field($model, 'unit_name');?>


<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>



