<?php

use yii\db\Migration;

/**
 * Class m220102_140113_create_table_tags
 */
class m220102_140113_create_table_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tags', [
            'id'            => $this->primaryKey(),
            'name'          => $this->string()->notNull(),
            'order'         => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220102_140113_create_table_tags cannot be reverted.\n";

        return false;
    }

}
