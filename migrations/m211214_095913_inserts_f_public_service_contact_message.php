<?php

use yii\db\Migration;

/**
 * Class m211214_095913_inserts_f_public_service_contact_message
 */
class m211214_095913_inserts_f_public_service_contact_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('public_service',
            [   
                'id'          => 1,
                'name'        => 'cnt_msg', 
                'description' => 'Mensages de Contacto Web',
                'controller'  => 'ContactMessageController',
                'action'      => '*',
                'method'      => '*'
            ]);
        $this->insert('public_service_couta_meter',
            [ 
                'id'                 => 1,
                'cod'                => 'cnt_msg-max_inp', 
                'description'        => 'Limite uso 5 por hora',
                'time_lapse_seconds' => 3600,
                'amount'             => 5
            ]);

        $this->insert('public_service_couta',
            [ 
                'id_cuota_meter'    => 1, 
                'id_public_service' => 1
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211214_095913_inserts_f_public_service_contact_message cannot be reverted.\n";

        return false;
    }

}
