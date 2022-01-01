<?php

use yii\db\Migration;

/**
 * Class m220101_112134_create_users_tables
 */
class m220101_112134_create_users_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('role', [
            'id'            => $this->primaryKey(),
            'type'          => $this->string(45)->notNull(),
        ]);

        $this->createTable('profile', [
            'id'           => $this->primaryKey(),
            'name'         => $this->string(59),
            'last_name'    => $this->string(50),
            'img_url'      => $this->string(200),
        ]);

        $this->createTable('user', [
            'id'                     => $this->primaryKey(),
            'username'               => $this->string(45),
            'password_hash'          => $this->string(255),
            'password_reset_token'   => $this->string(255),
            'access_token'           => $this->string(128),
            'created_at'             => $this->string(45),
            'updated_at'             => $this->string(45),
            'status'                 => $this->integer(1)->notNull(),
            'role_id'                => $this->integer()->notNull(),
            'profile_id'             => $this->integer()->notNull(),
        ]);
        $this->createIndex('fk_user_role_id', 'user', 'role_id');
        $this->addForeignKey(
            'fk_user_profile_id',
            'user',
            'profile_id',
            'profile',
            'id'
        );

        $this->addForeignKey(
            'fk_user_role_id',
            'user','role_id',
            'role','id'
        );

        $this->insert('profile',  [ 'id'  => 1, 'name' => 'administrador', 'last_name' => 'base' ]);
        $this->insert('profile',  [ 'id'  => 2, 'name' => 'cliente', 'last_name' => 'base' ]);

        $this->insert('role',  [ 'id'  => 1, 'type' => 'Administrador' ]);
        $this->insert('role',  [ 'id'  => 2, 'type' => 'Cliente' ]);

        $this->insert('user',  [ 'id'  => 1, 'username' => 'admin', 'password_hash' => '$2y$10$HTR60gXWuY9z93MPWz1jwu58Oqfys2pu3uxl6IiRvjYPUxpLzYFIu', 'password_reset_token' => Null, 'access_token' => 'ewrg(//(/FGtygvTCFR%&45fg6h7tm6tg65dr%RT&H/(O_O', 'created_at' => NULL, 'updated_at' => NULL, 'status' => 1, 'role_id' => 1, 'profile_id' => 1 ]);
        $this->insert('user',  [ 'id'  => 2, 'username' => 'cliente', 'password_hash' => '$2y$10$HTR60gXWuY9z93MPWz1jwu58Oqfys2pu3uxl6IiRvjYPUxpLzYFIu', 'password_reset_token' => Null, 'access_token' => 'ewrg(//(/FGtygvTCFR%&45fg6h7tm6tg65dr%RT&H/(O_O', 'created_at' => NULL, 'updated_at' => NULL, 'status' => 1, 'role_id' => 2, 'profile_id' => 2 ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220101_112134_create_users_tables cannot be reverted.\n";

        return false;
    }

}
