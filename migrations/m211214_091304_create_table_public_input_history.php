<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m211214_091304_create_table_public_input_history
 */
class m211214_091304_create_table_public_input_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('public_input_history', [
            'id'             => Schema::TYPE_PK,
            'client_ip4'     => $this->string()->notNull(),
            'client_ip6'     => $this->string()->notNull(),
            'cookie_session' => $this->text()->notNull(),
            'datetime'       => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('public_input_history');
    }

}
