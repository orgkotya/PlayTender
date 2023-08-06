<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%appellation}}`.
 */
class m230804_105342_create_appellation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%appellation}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
            'amount' => $this->integer()->notNull(),
            'unit_id' => $this->integer()->notNull(),
            'purchase_id' => $this->integer()->notNull()

        ]);

        $this->addForeignKey(
            'fk_unit_id',
            'appellation',
            'unit_id',
            'unit',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_purchase_id',
            'appellation',
            'purchase_id',
            'purchase',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%appellation}}');
        $this->dropForeignKey(
            'fk_unit_id',
            'appellation'
        );
    }
}
