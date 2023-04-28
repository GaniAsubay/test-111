<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checks}}`.
 */
class m230428_140819_create_checks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checks}}', [
            'id' => $this->primaryKey(),
            'status' => $this->smallInteger(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%checks}}');
    }
}
