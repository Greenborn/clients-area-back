<?php

use yii\db\Migration;

/**
 * Class m211230_192418_create_table_products
 */
class m211230_192418_create_table_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id'                  => $this->primaryKey(),
            'name'                => $this->string()->notNull(),
            'description'         => $this->text(),
            'order'               => $this->integer(),
            'img_src'             => $this->string(),
            'price'               => $this->text(),
            'service_id'          => $this->integer()->notNull(),
            'currency_id'         => $this->integer()->notNull(),
            'payment_interval_id' => $this->integer()->notNull()
        ]);

        $this->createTable('currency', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string()->notNull(),
            'short_text'  => $this->string()->notNull(),
            'symbol'      => $this->string()->notNull()
        ]);

        $this->insert('currency',
            [ 
                'id'          => 1,
                'name'        => "Pesos Argentinos", 
                'short_text'  => "AR$",
                'symbol'      => '$',
            ]);

        $this->createTable('payment_interval', [
                'id'          => $this->primaryKey(),
                'name'        => $this->string()->notNull(),
                'days'        => $this->integer()->notNull()
            ]);

        $this->insert('payment_interval',
            [ 
                'id'          => 1,
                'name'        => "Mensual", 
                'days'        => 30,
            ]);

        $this->addForeignKey(
            'fk-service_id_products_bussiness_service',
            'products',
            'service_id',
            'bussiness_service',
            'id'
        );

        $this->addForeignKey(
            'fk-currency_id_products_currency',
            'products',
            'currency_id',
            'currency',
            'id'
        );

        $this->addForeignKey(
            'fk-payment_interval_id_products_payment_interval',
            'products',
            'payment_interval_id',
            'payment_interval',
            'id'
        );

        $this->insert('bussiness_service',
            [ 
                'id'          => 5,
                'name'        => "Alojamiento Web", 
                'description' => 'El Web Hosting más conveniente.',
                'order'       => 50,
                'img_src'     => 'public/img/icon5.svg'
            ]);


        $this->insert('products',
            [ 
                'id'                  => 1,
                'name'                => "Web Hosting WordPress Basic", 
                'description'         => "La mejor opción para comenzar con tu Web/E-Commerce.",
                'order'               => 0,
                'img_src'             => 'public/img/webHostingBasic.svg',
                'price'               => '250',
                'service_id'          => 5,
                'currency_id'         => 1,
                'payment_interval_id' => 1
            ]);

        //Se insertan registros indicando a la API de que se trata de un servicio publico sin limite de consultas
        $this->insert('public_service',
            [   
                'id'          => 4,
                'name'        => 'all_products', 
                'description' => 'Productos - Publico',
                'controller'  => 'PublicProductController',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 4,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 4
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211230_192418_create_table_products cannot be reverted.\n";

        return false;
    }

}
