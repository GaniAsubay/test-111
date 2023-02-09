<?php

use yii\db\Migration;

/**
 * Class m230208_183303_CREATE_TABLE_GENRE
 */
class m230208_183303_CREATE_TABLE_GENRE extends Migration
{
    private $tableName = '{{%genre}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName,
            [
                'id' => $this->primaryKey(11),
                'name' => $this->string(50)->notNull(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230208_183303_CREATE_TABLE_GENRE cannot be reverted.\n";

        return false;
    }
    */
}
