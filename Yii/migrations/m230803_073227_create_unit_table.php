<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit}}`.
 */
class m230803_073227_create_unit_table extends Migration
{
    const DEFAULT_VALUES =['Units', 'Kilograms', 'Tons', 'Liters'];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'unit_name'=>$this->string(32)->notNull()->unique()
        ]);
        foreach (self::DEFAULT_VALUES as $unit_name){
            $this->insert('{{%unit}}', [
                'unit_name' => $unit_name
            ]);
        }

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%unit}}');
    }
}
