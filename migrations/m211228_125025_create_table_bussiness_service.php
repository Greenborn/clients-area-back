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
            'id'                           => $this->primaryKey(),
            'id_name_translate_cod'        => $this->integer()->notNull(),
            'id_description_translate_cod' => $this->integer()->notNull(),
            'order'                        => $this->integer(),
            'img_src'                      => $this->string()
        ]);

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

        // DESARROLLO DE APPS MOVILES
        $this->insert('terms',
            [ 
                'id' => 15, 'value' => "Desarrollo de APP's Moviles", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 16, 'value' => "Mobile APP Development", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 10,
                'term_id_1'   => 15, 
                'term_id_2'   => 16,
                'cod'         => 10,
                'zone_id'     => 2
            ]);

        $this->insert('terms',
            [ 
                'id' => 17, 'value' => "Programamos la APP que necesita, para luego poder exportarla a plataformas Android e IOs, utilizamos Frameworks hibridos como Ionic y React Native.", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 18, 'value' => "We program the APP you need, to then be able to export it to Android platforms and IOs, we use hybrid frameworks such as Ionic and React Native.", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 11,
                'term_id_1'   => 17, 
                'term_id_2'   => 18,
                'cod'         => 11,
                'zone_id'     => 2
            ]);
        $this->insert('bussiness_service',
            [ 
                'id'                           => 1,
                'id_name_translate_cod'        => 10, 
                'id_description_translate_cod' => 11,
                'order'                        => 10,
                'img_src'                      => 'assets/img/icon1.svg'
            ]);

        //WEB SCRAPPING
        $this->insert('terms',
            [ 
                'id' => 19, 'value' => "Web Scraping", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 20, 'value' => "Web Scraping", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 12,
                'term_id_1'   => 19, 
                'term_id_2'   => 20,
                'cod'         => 12,
                'zone_id'     => 2
            ]);

        $this->insert('terms',
            [ 
                'id' => 21, 'value' => "Descargamos información de sitios públicos de su elección para que Ud. pueda disponer de dicha información ya sea en formatos .CSV, Hoja de Cálculo,  Base de datos u otros a determinar.", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 22, 'value' => "We download information from public sites of your choice so that you can have such information either in formats. CSV, Spreadsheet, Database or others to be determined.", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 13,
                'term_id_1'   => 21, 
                'term_id_2'   => 22,
                'cod'         => 13,
                'zone_id'     => 2
            ]);
        $this->insert('bussiness_service',
            [ 
                'id'                           => 2,
                'id_name_translate_cod'        => 12, 
                'id_description_translate_cod' => 13,
                'order'                        => 20,
                'img_src'                      => 'assets/img/icon2.svg'
            ]);

        //Migración Web
        $this->insert('terms',
            [ 
                'id' => 23, 'value' => "Migración Web", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 24, 'value' => "Web Migration", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 14,
                'term_id_1'   => 23, 
                'term_id_2'   => 24,
                'cod'         => 14,
                'zone_id'     => 2
            ]);

        $this->insert('terms',
            [ 
                'id' => 25, 'value' => "Migramos el contenido de su actual página web, sin importar en que CMS esté desarrollada o otro CMS de su elección, nueva APP Movil o de Escritorio.", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 26, 'value' => "We migrate the content of your current website, regardless of whether CMS is developed or another CMS of your choice, new Mobile or Desktop APP.", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 15,
                'term_id_1'   => 25, 
                'term_id_2'   => 26,
                'cod'         => 15,
                'zone_id'     => 2
            ]);
        $this->insert('bussiness_service',
            [ 
                'id'                           => 3,
                'id_name_translate_cod'        => 14, 
                'id_description_translate_cod' => 15,
                'order'                        => 30,
                'img_src'                      => 'assets/img/icon3.svg'
            ]);

        //Solución de Errores
        $this->insert('terms',
            [ 
                'id' => 27, 'value' => "Solución de Errores", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 28, 'value' => "Error Resolution", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 16,
                'term_id_1'   => 27, 
                'term_id_2'   => 28,
                'cod'         => 16,
                'zone_id'     => 2
            ]);

        $this->insert('terms',
            [ 
                'id' => 29, 'value' => "Resolvemos aquellos errores que pudieran estar presentes en el código de su APP o que se deban a defectos de configuración de su servidor.", 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 30, 'value' => "We resolve any errors that may be present in the code of your APP or that are due to defects in the configuration of your server.", 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 17,
                'term_id_1'   => 29, 
                'term_id_2'   => 30,
                'cod'         => 17,
                'zone_id'     => 2
            ]);
        $this->insert('bussiness_service',
            [ 
                'id'                           => 4,
                'id_name_translate_cod'        => 16, 
                'id_description_translate_cod' => 17,
                'order'                        => 40,
                'img_src'                      => 'assets/img/icon4.svg'
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
