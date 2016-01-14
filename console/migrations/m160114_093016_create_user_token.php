<?php

use yii\db\Schema;
use yii\db\Migration;

class m160114_093016_create_user_token extends Migration
{
    const TAL_NAME = '{{%user_token}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TAL_NAME, [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull(),
            'user_agent' => $this->string()->notNull(),
            'token' => $this->string()->unique(),
            'type' => $this->string()->notNull()->unique(),
            'created' => $this->integer()->notNull(),
            'expires' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('i_token', self::TAL_NAME, ['token'], true);
        $this->createIndex('i_userid', self::TAL_NAME, ['userid'], false);
    }

    public function down()
    {
        echo "m160114_093016_create_user_token cannot be reverted.\n";
        $this->dropTable(self::TAL_NAME);
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
