<?php

use yii\db\Migration;

/**
 * Class m220228_041339_random_words
 */
class m220228_041339_random_words extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('random_words', [
            'id'           => $this->primaryKey(),
            'word'         => $this->string()->notNull(),
            'created_at'   => $this->datetime(),
        ]);

        $this->insert('public_service',
            [   
                'id'          => 8,
                'name'        => 'random_words', 
                'description' => 'Palabras aleatorias',
                'controller'  => 'GetRandomWord',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 8,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 8
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220228_041339_random_words cannot be reverted.\n";
        return false;
    }

}
