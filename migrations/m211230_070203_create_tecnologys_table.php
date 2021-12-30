<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tecnologys}}`.
 */
class m211230_070203_create_tecnologys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tecnology', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string()->notNull(),
            'description' => $this->text(),
            'url'         => $this->string(),
            'order'       => $this->integer(),
            'img_src'     => $this->string()
        ]);

        $this->insert('tecnology',
            [ 
                'id'          => 1,
                'name'        => "PHP",
                'description' => "",
                'url'         => "https://www.php.net/",
                'img_src'     => "public/img/php.svg",
                'order'       => 0
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 2,
                'name'        => "HTML",
                'description' => "",
                'url'         => "https://developer.mozilla.org/en-US/docs/Web/HTML",
                'img_src'     => "public/img/html.svg",
                'order'       => 10
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 3,
                'name'        => "Bootstrap",
                'description' => "",
                'url'         => "https://getbootstrap.com/",
                'img_src'     => "public/img/bootstrap.svg",
                'order'       => 20
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 4,
                'name'        => "JavaScript",
                'description' => "",
                'url'         => "https://developer.mozilla.org/en-US/docs/Learn/JavaScript/First_steps/What_is_JavaScript",
                'img_src'     => "public/img/js.svg",
                'order'       => 30
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 5,
                'name'        => "TypeScript",
                'description' => "",
                'url'         => "https://www.typescriptlang.org/",
                'img_src'     => "public/img/ts.svg",
                'order'       => 40
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 6,
                'name'        => "Python",
                'description' => "",
                'url'         => "https://www.python.org/",
                'img_src'     => "public/img/py.svg",
                'order'       => 50
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 7,
                'name'        => "Java",
                'description' => "",
                'url'         => "https://www.java.com",
                'img_src'     => "public/img/java.svg",
                'order'       => 50
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 8,
                'name'        => "Django",
                'description' => "",
                'url'         => "https://www.djangoproject.com/",
                'img_src'     => "public/img/dj.svg",
                'order'       => 60
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 9,
                'name'        => "Maria DB",
                'description' => "",
                'url'         => "https://mariadb.org/",
                'img_src'     => "public/img/mariadb.svg",
                'order'       => 70
            ]);

        $this->insert('tecnology',
            [ 
                'id'          => 10,
                'name'        => "WordPress",
                'description' => "",
                'url'         => "https://wordpress.com/",
                'img_src'     => "public/img/wp.svg",
                'order'       => 80
            ]);

        //Se insertan registros indicando a la API de que se trata de un servicio publico sin limite de consultas
        $this->insert('public_service',
            [   
                'id'          => 3,
                'name'        => 'all_tecnologys', 
                'description' => 'Tecnologìas - Publico',
                'controller'  => 'PublicTecnologyController',
                'action'      => '*',
                'method'      => '*'
            ]);

        $this->insert('public_service_couta',
            [ 
                'id'                => 3,
                'id_cuota_meter'    => 2, 
                'id_public_service' => 3
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "La migracion no puede ser revertida.\n";

        return false;
    }
}
