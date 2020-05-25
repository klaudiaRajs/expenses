<?php

namespace App\Database\Migrations;

class Migration_Add_shops extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'shop_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'limit' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
        ]);
        $this->forge->addKey('shop_id', true);
        $this->forge->createTable('shops');
        $this->db->query('ALTER TABLE `shops` ADD FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->forge->dropTable('shops');
    }
}