<?php

use yii\db\Migration;

/**
 * Handles the creation of table `items`.
 */
class m161219_115420_create_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('items', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'publication_date' => $this->datetime(),
            'upload_date' => $this->datetime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('items');
    }
}
