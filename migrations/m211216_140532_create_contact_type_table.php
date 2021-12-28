<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%contact_type}}`.
 */
class m211216_140532_create_contact_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact_type', [
            'id'                    => $this->primaryKey(),
            'name_translate_cod'    => $this->integer()->notNull(),
            'id_name_translate_cod' => $this->integer()->notNull(),
            'order'                 => $this->integer(),
            'logo_src'              => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contact_type');
    }
}
