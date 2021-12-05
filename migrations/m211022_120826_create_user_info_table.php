<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_info}}`.
 */
class m211022_120826_create_user_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'fio' => $this->string(255),
            'phone_number' => $this->string(15),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_info}}');
    }
}
