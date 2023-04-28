<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes}}`.
 */
class m230428_142406_create_dishes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dishes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'status' => $this->smallInteger(1),
            'cook_id' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dishes}}');
    }
}
