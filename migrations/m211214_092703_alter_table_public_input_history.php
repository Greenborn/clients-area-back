<?php

use yii\db\Migration;

/**
 * Class m211214_092703_alter_table_public_input_history
 */
class m211214_092703_alter_table_public_input_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('public_input_history', 'public_service_id', $this->integer());

        $this->addForeignKey(
            'fk-public_service-public_service_id',
            'public_input_history',
            'public_service_id',
            'public_service',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-public_service-public_service_id', 'public_input_history');
    }

}
