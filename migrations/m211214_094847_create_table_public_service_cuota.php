<?php

use yii\db\Migration;

/**
 * Class m211214_094847_create_table_public_service_cuota
 */
class m211214_094847_create_table_public_service_cuota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('public_service_couta', [
            'id'                 => $this->primaryKey(),
            'id_cuota_meter'     => $this->integer()->notNull(),
            'id_public_service'  => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-public_service_cm-public_service_cm_id',
            'public_service_couta',
            'id_cuota_meter',
            'public_service_couta_meter',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-public_service_ps-public_service_ps_id',
            'public_service_couta',
            'id_public_service',
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
        $this->dropForeignKey('fk-public_service_cm-public_service_cm_id', 'public_service_cuota');
        $this->dropForeignKey('fk-public_service_ps-public_service_ps_id', 'public_service_cuota');

        $this->dropTable('public_service_cuota');
    }

}
