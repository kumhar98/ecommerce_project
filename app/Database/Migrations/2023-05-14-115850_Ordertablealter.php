<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ordertablealter extends Migration
{
    public function up()
    {
        $fields = [
            'addressId' => [
                'type'           => 'INT',
                'unsigned'       => true,

            ],
        ];
        $this->forge->addKey('addressId');
        $this->forge->addForeignKey('addressId', 'address', 'id', 'CASCADE', 'CASCADE', 'addressId_fk');
        $this->forge->addColumn('orderstable', $fields);
    }

    public function down()
    {
        $this->forge->dropTable('orderstable');
    }
}
