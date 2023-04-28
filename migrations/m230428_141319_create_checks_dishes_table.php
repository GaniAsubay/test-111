<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checks_dishes}}`.
 */
class m230428_141319_create_checks_dishes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checks_dishes}}', [
            'id' => $this->primaryKey(),
            'check_id' => $this->integer(11),
            'dish_id' => $this->integer(11),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%checks_dishes}}');
    }
}
