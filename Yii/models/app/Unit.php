<?php

namespace app\models\app;

use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


/**
 * Purchase model
 *
 * @property integer $id
 * @property string $unit_name
 */
class Unit extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%unit}}';
    }

    public function rules()
    {
        return [
            [['unit_name'], 'required'],
        ];
    }

    public static function getUnitList()
    {
        return ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'unit_name');
    }

}