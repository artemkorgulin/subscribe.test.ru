<?php

use yii\db\Migration;

/**
 * Handles the creation of table `events`.
 */
class m180222_125421_create_events_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%events%}}', [
            'id'       => $this->primaryKey(),
            'name'      => $this->string(255),
            'date_create'  => $this->string(255),
            'date_update'    => $this->string(255)
        ], $tableOptions);

        $this->execute(file_get_contents(__DIR__ . '/dump/events.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%events}}');
    }

}
