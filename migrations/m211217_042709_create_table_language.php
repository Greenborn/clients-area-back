<?php

use yii\db\Migration;

/**
 * Class m211217_042709_create_table_language
 */
class m211217_042709_create_table_language extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('language', [
            'id'             => $this->primaryKey(),
            'description'    => $this->string()->notNull(),
            'traduction_id'  => $this->integer(),
            'flag_image_src' => $this->string(),
        ]);

        $this->insert('language',
            [ 
                'id'            => 1,
                'description'   => 'Español', 
            ]);

        $this->insert('language',
            [ 
                'id'            => 2,
                'description'   => 'Inglés', 
            ]);
        
        $this->insert('language',
            [ 
                'id'            => 3,
                'description'   => 'Universal', 
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_042709_create_table_language cannot be reverted.\n";

        return false;
    }
}
