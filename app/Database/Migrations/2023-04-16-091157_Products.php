<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'product_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_des' => [
                'type' => 'text',
                'null' => FALSE,
            ],
            'qty' => [
                'type' => 'INT',
                'null' => FALSE,
            ],
            'MRP' => [
                'type' => 'DECIMAL',
                'constraint'=> '10,2',
                'null' => FALSE,
                'default'=> 0.00,
            ],
            'selling_price' => [
                'type' => 'DECIMAL',
                'constraint'=> '10,2',
                'null' => FALSE,
                'default'=> 0.00,
            ],
            'image1' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL

            ],
            'image2' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL

            ],
            'image3' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL

            ],
            'image4' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL

            ],
            'Color' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE,
                

            ],
            'cat_id_fk' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,

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
        $this->forge->addKey('id', TRUE);
        $this->forge->addKey('cat_id_fk');
        $this->forge->addForeignKey('cat_id_fk', 'category', 'id', 'CASCADE', 'CASCADE', 'category_cat_id_fk');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
