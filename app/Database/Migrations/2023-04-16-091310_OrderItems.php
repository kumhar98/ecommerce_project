<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class OrderItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'item_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',

            ],
            'items_amount' => [
                'type'           => 'DECIMAL',
                'unsigned'       => true,
                'constraint'     => '10,2',
            ],
            'items_qty' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'fk_orderid' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
           'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
             ],
             'updated_at' => [
                 'type' => 'TIMESTAMP',
                 'default' => new RawSql('CURRENT_TIMESTAMP')
             ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('fk_orderid');
        $this->forge->addForeignKey('fk_orderid', 'order', 'id', 'CASCADE', 'CASCADE', 'order_orderitems');
        $this->forge->createTable('orderItems');

    }

    public function down()
    {
        $this->forge->dropTable('orderItems');
    }
}
