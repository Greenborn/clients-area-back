<?php

use yii\db\Migration;

/**
 * Class m211228_125025_create_table_bussiness_service
 */
class m211228_125025_create_table_bussiness_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bussiness_service', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'order'       => $this->integer(),
            'img_src'     => $this->string()
        ]);
/*
        $this->addForeignKey(
            'fk-id_name_translate_codbussiness_service',
            'bussiness_service',
            'id_name_translate_cod',
            'translate_terms',
            'cod',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-id_description_translate_codbussiness_service',
            'bussiness_service',
            'id_description_translate_cod',
            'translate_terms',
            'cod',
            'CASCADE'
        );
*/
        // DESARROLLO DE APPS MOVILES
        $this->insert('bussiness_service',
            [ 
                'id'          => 1,
                'name'        => "Desarrollo de APP's Moviles", 
                'description' => "Programamos la APP que necesita, para luego poder exportarla a plataformas Android e IOs, utilizamos Frameworks hibridos como Ionic y React Native.",
                'order'       => 10,
                'img_src'     => 'assets/img/icon1.svg'
            ]);

        //WEB SCRAPPING
        $this->insert('bussiness_service',
            [ 
                'id'          => 2,
                'name'        => "Web Scraping", 
                'description' => "Descargamos información de sitios públicos de su elección para que Ud. pueda disponer de dicha información ya sea en formatos .CSV, Hoja de Cálculo,  Base de datos u otros a determinar.",
                'order'       => 20,
                'img_src'     => 'assets/img/icon2.svg'
            ]);

        //Migración Web
        $this->insert('bussiness_service',
            [ 
                'id'          => 3,
                'name'        => "Migración Web", 
                'description' => "Migramos el contenido de su actual página web, sin importar en que CMS esté desarrollada o otro CMS de su elección, nueva APP Movil o de Escritorio.",
                'order'       => 30,
                'img_src'     => 'assets/img/icon3.svg'
            ]);

        //Solución de Errores
             $this->insert('bussiness_service',
            [ 
                'id'          => 4,
                'name'        => "Solución de Errores", 
                'description' => 'Resolvemos aquellos errores que pudieran estar presentes en el código de su APP o que se deban a defectos de configuración de su servidor.',
                'order'       => 40,
                'img_src'     => 'assets/img/icon4.svg'
            ]);

        //Se insertan registros indicando a la API de que se trata de un servicio publico sin limite de consultas
        $this->insert('public_service',
            [   
                'id'          => 2,
                'name'        => 'all_services', 
                'description' => 'Servicios Ofrecidos',
                'controller'  => 'PublicBussinessServiceController',
                'action'      => '*',
                'method'      => '*'
            ]);
        $this->insert('public_service_couta_meter',
            [ 
                'id'                 => 2,
                'cod'                => 'all_services-ilimitado', 
                'description'        => 'Sin limite de consulta',
                'time_lapse_seconds' => -1,
                'amount'             => -1
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 2,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 2
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211228_125025_create_table_bussiness_service cannot be reverted.\n";

        return false;
    }

}
