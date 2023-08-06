<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Purchase list';
$this->params['breadcrumbs'][] = $this->title;
/** @var \app\models\app\Purchase $model */
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('add Purchase', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('add appellation', ['admin/appellation/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([

        'dataProvider' => $model->search(),
        'filterModel' => $model,
        'columns' => [
            'id',
            'name',
            'description',
            'budget',
            [
                "label" => "Status",
                'content' => static function ($data) {
                    return \app\models\app\Purchase::itemAlias($data->status);
                },
                'visible' => true
            ],
            [
                "label" => "created_at",
                'content' => static function ($data) {
                    return date('Y-m-d H:i:s', $data->created_at);
                },
                'visible' => true
            ],
            [
                "label" => "updated_at",
                'content' => static function ($data) {
                    return isset($data->updated_at) ?  date('Y-m-d H:i:s', $data->updated_at):"not set";
                },
                'visible' => true
            ],

            [
                "label" => "Detales",
                'content' => static function ($data) {
        $result ='';
                    foreach($data->appellation as $appellation){

                        $result .="<ul class='list-group-item d-flex justify-content-between align-items-center'>
  <li class='list-group-item d-flex justify-content-between'>$appellation->description</li>
  <li class='list-group-item d-flex justify-content-between'><b>{$appellation->amount} </b> {$appellation->unit->unit_name}</li>
</ul>";

                    }
                    return $result;
                },
                'visible' => true
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}'
            ],

        ],


    ]); ?>


