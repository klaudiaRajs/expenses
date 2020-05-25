<?php

namespace App\Database\Migrations;

class Migration_Add_products extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'purchase_date' => [
                'type' => 'DATE'
            ],
            'comment' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'shop_id' => [
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

        $this->forge->addField("created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP()");
        $this->forge->addField("updated_at TIMESTAMP NULL");
        $this->forge->addField("deleted_at TIMESTAMP NULL");
        $this->forge->addKey('product_id', true);
        $this->forge->createTable('products');
        $this->db->query('ALTER TABLE `products` ADD FOREIGN KEY(`category_id`) REFERENCES `categories`(`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `products` ADD FOREIGN KEY(`shop_id`) REFERENCES `shops`(`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `products` ADD FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}