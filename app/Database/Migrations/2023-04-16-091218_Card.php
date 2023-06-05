<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Card extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_product_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'addQty' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'cost' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'addMrp' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'totalMrp' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'totalCost' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
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
        $this->forge->addKey('fk_product_id');
        $this->forge->addKey('user_id');
        $this->forge->addForeignKey('fk_product_id', 'products', 'id', 'CASCADE', 'CASCADE', 'products_fk_product_id');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE', 'useradmin_fk_useradmin_id');
        $this->forge->createTable('card');

    }

    public function down()
    {
        $this->forge->dropTable('card');
    }
}
