<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Appellation list';
$this->params['breadcrumbs'][] = $this->title;
/** @var \app\models\app\Appellation $model */
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('add appellation', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('add unit', ['admin/unit/create'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= GridView::widget([

        'dataProvider' => $model->search(),
        'filterModel' => $model,
        'columns' => [
            'id',
            'description',
            'amount',
            [
                "label" => "Unit",
                'content' => static function ($data) {
                    return $data->unit->unit_name;
                },
                'visible' => true
            ],
            [
                "label" => "Сlient",
                'content' => static function ($data) {
                    return $data->purchase->name;
                },
                'visible' => true
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}'
            ],
        ],

    ]); ?>


