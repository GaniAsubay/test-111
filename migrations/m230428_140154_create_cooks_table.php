<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cooks}}`.
 */
class m230428_140154_create_cooks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cooks}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cooks}}');
    }
}
