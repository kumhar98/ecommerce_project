<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class Useradmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',

            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phoneNo' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'profilePic' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('useradmin');
    }

    public function down()
    {
        $this->forge->dropTable('useradmin');
    }
}
