<?php

use yii\db\Migration;

/**
 * Class m220102_140056_create_table_category
 */
class m220102_140056_create_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id'               => $this->primaryKey(),
            'name'             => $this->string()->notNull(),
            'order'            => $this->integer(),
            'root_category_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_category_root_category_id',
            'category',
            'root_category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220102_140056_create_table_category cannot be reverted.\n";

        return false;
    }

   
}
