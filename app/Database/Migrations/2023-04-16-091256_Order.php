<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'order_amount' => [
                'type'           => 'DECIMAL',
                'unsigned'       => true,
                'constraint'     => '10,2',
            ],
            'order_date' => [
                'type'           => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'order_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending','Acceptted', 'out of delivery','delivered'],
                'default'    => 'pending',
            ],
            'order_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Online','COD'],
                'default'    => 'COD',
            ],
            'fk_userid' => [
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
        $this->forge->addKey('fk_userid');
        $this->forge->addForeignKey('fk_userid', 'user', 'id',  'CASCADE', 'CASCADE', 'useradmin_fk_userid');
        $this->forge->createTable('orderstable');
        
    }

    public function down()
    {
        $this->forge->dropTable('orderstable');
    }
}
