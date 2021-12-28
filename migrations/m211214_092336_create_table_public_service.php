<?php

use yii\db\Migration;

/**
 * Class m211214_092336_create_table_public_service
 */
class m211214_092336_create_table_public_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('public_service', [
            'id'             => $this->primaryKey(),
            'name'           => $this->string()->notNull(),
            'description'    => $this->string()->notNull(),
            'controller'     => $this->string()->notNull(),
            'method'         => $this->string(),
            'action'         => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('public_service');
    }

}
