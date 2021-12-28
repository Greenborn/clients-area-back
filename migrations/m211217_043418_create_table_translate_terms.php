<?php

use yii\db\Migration;

/**
 * Class m211217_043418_create_table_translate_terms
 */
class m211217_043418_create_table_translate_terms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('translate_terms', [
            'id'             => $this->integer(),
            'term_id_1'      => $this->integer()->notNull(),
            'term_id_2'      => $this->integer(),
            'cod'            => $this->integer()->notNull(),
            'zone_id'        => $this->integer(),
        ]);
        $this->addPrimaryKey('translate_terms_pk', 'translate_terms', ['cod','id']);

        $this->addForeignKey(
            'fk-translate_terms1-term_id',
            'translate_terms',
            'term_id_1',
            'terms',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-translate_terms2-term_id',
            'translate_terms',
            'term_id_2',
            'terms',
            'id',
            'CASCADE'
        );

        $this->insert('translate_terms',
            [ 
                'id'          => 1,
                'term_id_1'   => 1, 
                'term_id_2'   => 3,
                'cod'         => 1,
                'zone_id'     => 0
            ]);

        $this->insert('translate_terms',
            [ 
                'id'          => 2,
                'term_id_1'   => 2, 
                'term_id_2'   => 4,
                'cod'         => 2,
                'zone_id'     => 0
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_043418_create_table_translate_terms cannot be reverted.\n";

        return false;
    }
}
