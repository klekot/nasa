<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 * Has foreign keys to the tables:
 *
 * - `item`
 */
class m161219_120958_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'body' => $this->text(),
            'item_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
