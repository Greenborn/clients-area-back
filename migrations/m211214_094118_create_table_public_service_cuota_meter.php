<?php

use yii\db\Migration;

/**
 * Class m211214_094118_create_table_public_service_cuota_meter
 */
class m211214_094118_create_table_public_service_cuota_meter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('public_service_couta_meter', [
            'id'                 => $this->primaryKey(),
            'cod'                => $this->string()->notNull(),
            'description'        => $this->string()->notNull(),
            'time_lapse_seconds' => $this->integer()->notNull(),
            'amount'             => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('public_service_cuota_meter');
        
    }

}
