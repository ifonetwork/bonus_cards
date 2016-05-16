<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cards`.
 */
class m160516_085422_create_cards extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cards', [
            'id' => $this->primaryKey(),
            'series' => $this->string(5)->notNull(),
            'number' => $this->integer(),
            'time_generated' => $this->datetime(),
            'time_used' => $this->datetime(),
            'used' => $this->integer()->defaultValue(0),
            'active' => $this->integer()->defaultValue(1),
            'expiration_date' => $this->datetime(),
            'bonus' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cards');
    }
}
