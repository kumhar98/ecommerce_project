<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class Address extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fullName' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',

            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',

            ],
            'distic' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'subDistic' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'houseNo' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'streetAria' => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'mobileNo' => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'userId' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'pinCode' => [
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
        $this->forge->addKey('userId');
        $this->forge->addForeignKey('userId', 'user', 'id', 'CASCADE', 'CASCADE', 'address_user_fk');
        $this->forge->createTable('address');

    }

    public function down()
    {
        $this->forge->dropTable('address');
    }
}
