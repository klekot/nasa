<?php

use yii\db\Migration;

/**
 * Handles adding items to table `comments`.
 * Has foreign keys to the tables:
 *
 * - `items`
 */
class m161219_123348_add_items_column_to_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('comments', 'items_id', $this->integer()->notNull());

        // creates index for column `items_id`
        $this->createIndex(
            'idx-comments-items_id',
            'comments',
            'items_id'
        );

        // add foreign key for table `items`
        $this->addForeignKey(
            'fk-comments-items_id',
            'comments',
            'items_id',
            'items',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `items`
        $this->dropForeignKey(
            'fk-comments-items_id',
            'comments'
        );

        // drops index for column `items_id`
        $this->dropIndex(
            'idx-comments-items_id',
            'comments'
        );

        $this->dropColumn('comments', 'items_id');
    }
}
