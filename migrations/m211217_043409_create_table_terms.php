<?php

use yii\db\Migration;

/**
 * Class m211217_043409_create_table_terms
 */
class m211217_043409_create_table_terms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('terms', [
            'id'             => $this->primaryKey(),
            'value'          => $this->text()->notNull(),
            'language_id'    => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-terms-language_id',
            'terms',
            'language_id',
            'language',
            'id',
            'CASCADE'
        );

        $this->insert('terms',
            [ 
                'id' => 1, 'value' => 'Español', 'language_id' => 1
            ]);

        $this->insert('terms',
            [ 
                'id' => 2, 'value' => 'Inglés', 'language_id' => 1
            ]);

        $this->insert('terms',
            [ 
                'id' => 3, 'value' => 'Spanish', 'language_id' => 2
            ]);

        $this->insert('terms',
            [ 
                'id' => 4, 'value' => 'Universal', 'language_id' => 1
            ]);

        $this->insert('terms',
            [ 
                'id' => 5, 'value' => 'Universal', 'language_id' => 2
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_043409_create_table_terms cannot be reverted.\n";

        return false;
    }
}
