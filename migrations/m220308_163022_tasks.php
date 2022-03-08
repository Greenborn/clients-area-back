<?php

use yii\db\Migration;

/**
 * Class m220308_163022_tasks
 */
class m220308_163022_tasks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id'                  => $this->primaryKey(),
            'name'                => $this->string()->notNull(),
            'description'         => $this->text(),
            'order'               => $this->integer(),
            'proyect_id'          => $this->integer()->notNull(),
            'column_id'           => $this->integer()->notNull(),
            'created_at'          => $this->datetime(),
            'uploaded_at'         => $this->datetime(),
            'expiration'          => $this->datetime(),
        ]);

        $this->addForeignKey(
            'fk-task_proyect',
            'task',    'proyect_id',
            'proyect', 'id'
        );

        $this->createTable('task_column', [
            'id'                  => $this->primaryKey(),
            'name'                => $this->string()->notNull(),
            'order'               => $this->integer(),
            'proyect_id'          => $this->integer(),
            'created_at'          => $this->datetime(),
            'uploaded_at'         => $this->datetime()
        ]);

        $this->addForeignKey(
            'fk-task_task_column',
            'task',        'column_id',
            'task_column', 'id'
        );

        $this->addForeignKey(
            'fk-task_column_proyect_id',
            'task_column',    'proyect_id',
            'proyect',        'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220308_163022_tasks cannot be reverted.\n";

        return false;
    }
}
