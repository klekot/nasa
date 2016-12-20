<?php

use yii\db\Migration;

class m161219_130908_add_columns_to_items_table extends Migration
{
    public function up()
    {
        $this->addColumn('items', 'link', $this->string());
        $this->addColumn('items', 'description', $this->text());
        $this->addColumn('items', 'enclosure', $this->string());
        $this->addColumn('items', 'guid', $this->string());
        $this->addColumn('items', 'source', $this->string());
    }

    public function down()
    {
        $this->dropColumn('items', 'link');
        $this->dropColumn('items', 'description');
        $this->dropColumn('items', 'enclosure');
        $this->dropColumn('items', 'guid');
        $this->dropColumn('items', 'source');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
