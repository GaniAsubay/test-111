<?php

use yii\db\Migration;

/**
 * Class m230208_183425_CREATE_TABLE_BOOK_GENRES
 */
class m230208_183425_CREATE_TABLE_BOOK_GENRES extends Migration
{
    private $tableName = '{{%book_genres}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName,
            [
                'id' => $this->primaryKey(11),
                'genre_id' => $this->integer()->notNull(),
                'book_id' => $this->integer()->notNull(),
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
        echo "m230208_183425_CREATE_TABLE_BOOK_GENRES cannot be reverted.\n";

        return false;
    }
    */
}
