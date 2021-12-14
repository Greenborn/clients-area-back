<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m211214_083258_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact_message', [
            'id'       => Schema::TYPE_PK,
            'name'     => $this->string()->notNull(),
            'surname'  => $this->string()->notNull(),
            'email'    => $this->string(),
            'tel'      => $this->string(),
            'message'  => $this->text()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contact_message');
    }
}
