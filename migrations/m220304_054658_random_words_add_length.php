<?php

use yii\db\Migration;

/**
 * Class m220304_054658_random_words_add_length
 */
class m220304_054658_random_words_add_length extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('random_words', 'length', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220304_054658_random_words_add_length cannot be reverted.\n";

        return false;
    }

}
