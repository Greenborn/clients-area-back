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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('public_service');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211214_092336_create_table_public_service cannot be reverted.\n";

        return false;
    }
    */
}
