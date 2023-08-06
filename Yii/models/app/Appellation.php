<?php

namespace app\models\app;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveRecord;


/**
 * Purchase model
 *
 * @property integer $id
 * @property string $description
 * @property float $amount
 * @property integer $unit_id
 * @property integer $purchase_id
 */
class Appellation extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%appellation}}';
    }

    public function rules()
    {
        return [
            [['description', 'amount', 'unit_id', 'purchase_id'], 'required'],
        ];
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, ['id' => 'unit_id']);
    }

    public function getPurchase()
    {
        return $this->hasOne(Purchase::class, ['id' => 'purchase_id']);
    }

    public function search()
    {
        $query = self::find();
        $query->joinWith('purchase')
            ->where(['=', 'user_id', Yii::$app->user->id]);

        $query->andFilterWhere([
            'id' => $this->id,
            'description' => $this->description,
            'amount' => $this->amount,
            'unit_id' => $this->unit_id,

        ]);

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => new Pagination([
                'pageSize' => 10
            ])
        ]);
    }

}