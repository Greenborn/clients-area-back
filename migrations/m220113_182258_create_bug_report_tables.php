<?php

use yii\db\Migration;

/**
 * Class m220113_182258_create_bug_report_tables
 */
class m220113_182258_create_bug_report_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Tablas de reporte de bugs y proyectos
        $this->createTable('bug_report', [
            'id'            => $this->primaryKey(),
            'proyect_id'    => $this->integer()->notNull(),
            'description'   => $this->text()->notNull(),
            'date'          => $this->datetime(),
        ]);

        $this->createTable('proyect', [
            'id'            => $this->primaryKey(),
            'name'          => $this->text()->notNull(),
            'code'          => $this->string()->notNull(),
        ]);

        $this->createTable('bug_report_image', [
            'id'            => $this->primaryKey(),
            'src'           => $this->string()->notNull(),
            'bug_report_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'bug_report_proyect',
            'bug_report', 'proyect_id',
            'proyect',    'id'
        );

        $this->addForeignKey(
            'bug_report_image_bug_report',
            'bug_report_image', 'bug_report_id',
            'bug_report',  'id'
        );

        //Se agrega cuota de uso
        $this->insert('public_service',
            [   
                'id'          => 5,
                'name'        => 'bug_report', 
                'description' => 'Reporte de Errores',
                'controller'  => 'PublicBugReportController',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 5,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 5
            ]);

        $this->insert('public_service',
            [   
                'id'          => 6,
                'name'        => 'bug_report_image', 
                'description' => 'Reporte de Errores - Carga de Imágenes',
                'controller'  => 'PublicBugReportImageController',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 6,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 6
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220113_182258_create_bug_report_tables cannot be reverted.\n";
        return false;
    }

}
