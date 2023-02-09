<?php

use yii\db\Migration;

/**
 * Class m230207_203659_CREATE_TABLE_BOOK
 */
class m230207_203659_CREATE_TABLE_BOOK extends Migration
{
    private $tableName = '{{%book}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName,
        [
            'id' => $this->primaryKey(11),
            'name' => $this->string(50)->notNull(),
            'author_id' => $this->integer()->notNull(),
            'publish_dt' => $this->date()->notNull()
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
        echo "m230207_203659_CREATE_TABLE_BOOK cannot be reverted.\n";

        return false;
    }
    */
}
