<?php

use yii\db\Migration;

/**
 * Class m211217_051410_insert_contact_types
 */
class m211217_051410_insert_contact_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //RESTRICCIONES
        /*$this->addForeignKey(
            'fk-name_translate_cod345',
            'contact_type',
            'name_translate_cod',
            'translate_terms',
            'cod',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-id_name_translate_cod',
            'contact_type',
            'id_name_translate_cod',
            'translate_terms',
            'cod',
            'CASCADE'
        );*/
        

        //FACEBOOK
        $this->insert('terms',
            [ 
                'id' => 6, 'value' => 'Facebook', 'language_id' => 3
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 3,
                'term_id_1'   => 6, 
                'cod'         => 3,
                'zone_id'     => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 7, 'value' => 'Nombre de Usuario', 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 8, 'value' => 'User Name', 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 4,
                'term_id_1'   => 7,
                'term_id_2'   => 8, 
                'cod'         => 4,
                'zone_id'     => 1
            ]);
        $this->insert('contact_type',
            [ 
                'id'                    => 1,
                'name_translate_cod'    => 3,
                'id_name_translate_cod' => 4,
                'order'                 => 10,
                'logo_src'              => '',
            ]);

        //Teléfono
        $this->insert('terms',
            [ 
                'id' => 9, 'value' => 'Tel', 'language_id' => 3
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 5,
                'term_id_1'   => 9, 
                'cod'         => 5,
                'zone_id'     => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 10, 'value' => 'Número de Teléfono', 'language_id' => 1
            ]);
        $this->insert('terms',
            [ 
                'id' => 11, 'value' => 'Phone Number', 'language_id' => 2
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 6,
                'term_id_1'   => 10,
                'term_id_2'   => 11, 
                'cod'         => 6,
                'zone_id'     => 1
            ]);
        $this->insert('contact_type',
            [ 
                'id'                    => 2,
                'name_translate_cod'    => 5,
                'id_name_translate_cod' => 6,
                'order'                 => 0,
                'logo_src'              => '',
            ]);

        //EMAIL
        $this->insert('terms',
            [ 
                'id' => 12, 'value' => 'E-Mail', 'language_id' => 3
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 7,
                'term_id_1'   => 12, 
                'cod'         => 7,
                'zone_id'     => 1
            ]);
        $this->insert('contact_type',
            [ 
                'id'                    => 3,
                'name_translate_cod'    => 7,
                'id_name_translate_cod' => 7,
                'order'                 => 5,
                'logo_src'              => '',
            ]);
        
        //INSTAGRAM
        $this->insert('terms',
            [ 
                'id' => 13, 'value' => 'Instagram', 'language_id' => 3
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 8,
                'term_id_1'   => 13, 
                'cod'         => 8,
                'zone_id'     => 1
            ]);
        $this->insert('contact_type',
            [ 
                'id'                    => 4,
                'name_translate_cod'    => 8,
                'id_name_translate_cod' => 4,
                'order'                 => 15,
                'logo_src'              => '',
            ]);

        //DISCORD
        $this->insert('terms',
            [ 
                'id' => 14, 'value' => 'Discord', 'language_id' => 3
            ]);
        $this->insert('translate_terms',
            [ 
                'id'          => 9,
                'term_id_1'   => 14, 
                'cod'         => 9,
                'zone_id'     => 1
            ]);
        $this->insert('contact_type',
            [ 
                'id'                    => 5,
                'name_translate_cod'    => 9,
                'id_name_translate_cod' => 4,
                'order'                 => 20,
                'logo_src'              => '',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_051410_insert_contact_types cannot be reverted.\n";

        return false;
    }
}
