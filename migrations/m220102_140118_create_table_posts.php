<?php

use yii\db\Migration;

/**
 * Class m220102_140118_create_table_posts
 */
class m220102_140118_create_table_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id'            => $this->primaryKey(),
            'title'         => $this->string()->notNull(),
            'content'       => $this->text()->notNull(),
            'autor_id'      => $this->integer(),
            'date'          => $this->datetime(),
        ]);

        $this->createTable('post_tags', [
            'id'           => $this->primaryKey(),
            'post_id'      => $this->integer()->notNull(),
            'tag_id'       => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_post_tags_post_id',
            'post_tags',
            'post_id',
            'post',
            'id'
        );
        $this->addForeignKey(
            'fk_post_tags_tag_id',
            'post_tags',
            'tag_id',
            'tags',
            'id'
        );

        $this->createTable('post_categorys', [
            'id'           => $this->primaryKey(),
            'post_id'      => $this->integer()->notNull(),
            'category_id'  => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_post_categorys_post_id',
            'post_categorys',
            'post_id',
            'post',
            'id'
        );
        $this->addForeignKey(
            'fk_post_categorys_tag_id',
            'post_categorys',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220102_140118_create_table_posts cannot be reverted.\n";

        return false;
    }

}
