<?php

use yii\db\Migration;

/**
 * Class m220114_214255_create_cuota_for_proyect
 */
class m220114_214255_create_cuota_for_proyect extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('public_service',
            [   
                'id'          => 7,
                'name'        => 'proyects', 
                'description' => 'Proyectos',
                'controller'  => 'PublicProyectController',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 7,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 7
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220114_214255_create_cuota_for_proyect cannot be reverted.\n";

        return false;
    }

}
