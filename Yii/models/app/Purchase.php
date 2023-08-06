<?php
namespace app\models\app;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


/**
 * Purchase model
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property float $budget
 * @property integer $status
 * @property string $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Purchase extends ActiveRecord
{
    const STATUS_DRAFT = 0,
        STATUS_ACTIVE = 1;


    public static function tableName()
    {
        return '{{%purchase}}';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'budget', 'created_at'], 'required'],
            ['status', 'in', 'range' => [self::STATUS_DRAFT, self::STATUS_ACTIVE]],
        ];
    }
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'name' => Yii::t('main', 'Name'),
//            'description' => Yii::t('main', 'Description'),
//            'budget' => Yii::t('main', 'Budget'),
//            'created_at' => Yii::t('main', 'Date created'),
//            'updated_at' => Yii::t('main', 'Last Updated'),
//        ];
//    }
    public static function itemAlias($code = NULL)
    {
        $_items = [
                self::STATUS_DRAFT => "Draft",
                self::STATUS_ACTIVE => "Active",


        ];

        if (isset($code)) {
            return $_items[$code];
        }
        return $_items;
    }

    public function search()
    {
        $query = self::find();
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => Yii::$app->user->id,

        ]);

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => new Pagination([
                'pageSize' => 10
            ])
        ]);
    }

    public static function getPurchasesList()
    {
        return ArrayHelper::map(Purchase::find()->where(['=','user_id', Yii::$app->user->id])->asArray()->all(), 'id', 'name');
    }
    public function getAppellation()
    {
        return $this->hasMany(Appellation::class, ['purchase_id' => 'id']);
    }
}