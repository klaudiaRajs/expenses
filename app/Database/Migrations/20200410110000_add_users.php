<?php

namespace App\Database\Migrations;

class Migration_Add_users extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'login' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'period_start_day' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'income' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ]
        ]);

        $this->forge->addField("created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP()");
        $this->forge->addField("updated_at TIMESTAMP NULL");
        $this->forge->addField("deleted_at TIMESTAMP NULL");
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}