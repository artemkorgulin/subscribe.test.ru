<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribers`.
 */
class m180221_125420_create_subscribers_table extends Migration
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

        $this->createTable('{{%subscribers%}}', [
            'id'       => $this->primaryKey(),
            'type_id'  => $this->integer()->notNull()->defaultValue(12),
            'event'      => $this->integer()->notNull(),
            'client' => $this->string(255),
            'blocked'     => $this->string(255),
            'date_create'  => $this->string(255),
            'date_update'    => $this->string(255)
        ], $tableOptions);

        $this->createIndex('idx_client', '{{%subscribers}}', 'client');

        $this->execute(file_get_contents(__DIR__ . '/dump/subscribers.sql'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx_client', '{{%subscribers}}');
        $this->dropTable('{{%subscribers}}');
    }

}
