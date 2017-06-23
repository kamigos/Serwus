<?php

use yii\db\Migration;

class m170622_101526_serwus_menu extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%restaurant_menu_category}}',[
                'id' => $this->primaryKey(),
                'name' => $this->string(16)->notNull(),
            ], $tableOptions);

        $this->createTable('{{%restaurant_eat_type}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()
        ], $tableOptions);

        $this->createTable('{{%restaurant_menu_eat}}',[
            'menu_id' => $this->integer()->notNull(),
            'eat_id' => $this->integer()->notNull(),
        ],$tableOptions);


        $this->createTable('{{%restaurant_menu}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'ingredients' => $this->string(255)->notNull(),
            'price' => $this->decimal(2)->notNull(),
            'category_id' => $this->integer(),
        ], $tableOptions);


        $this->addPrimaryKey('pk_menu_eat','{{%restaurant_menu_eat}}',['menu_id','eat_id']);

        $this->addForeignKey('fk_menu_category','{{%restaurant_menu}}','category_id','{{%restaurant_menu_category}}','id','set null','cascade');
        $this->addForeignKey('fk_menu-eat-menu-id', '{{%restaurant_menu_eat}}', 'menu_id', '{{%restaurant_menu}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_menu-eat-type', '{{%restaurant_menu_eat}}', 'eat_id', '{{%restaurant_eat_type}}', 'id', 'cascade', 'cascade');

    }

    public function safeDown()
    {
        echo "m170622_101526_serwus_menu cannot be reverted.\n";

        $this->dropForeignKey('fk_menu_category','{{%restaurant_menu}}');
        $this->dropForeignKey('fk_menu-eat-menu-id','{{%restaurant_menu_eat}}');
        $this->dropForeignKey('fk_menu-eat-type','{{%restaurant_menu_eat}}');

        $this->dropTable('{{%restaurant_menu_eat}}');
        $this->dropTable('{{%restaurant_eat_type}}');
        $this->dropTable('{{%restaurant_menu}}');
        $this->dropTable('{{%restaurant_menu_category}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170622_101526_serwus_menu cannot be reverted.\n";

        return false;
    }
    */
}
