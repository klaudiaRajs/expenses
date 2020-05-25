<?php

namespace App\Database\Migrations;

class Migration_Add_categories extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'limit' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]
        ]);
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('categories');
        $this->db->query('ALTER TABLE `categories` ADD FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}