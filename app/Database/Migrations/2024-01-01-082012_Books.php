<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
        // Books
        // $this->forge->addField([
        //     'book_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'title'            => ['type' => 'varchar', 'constraint' => 255],
        //     'category_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        //     'description'      => ['type' => 'text', 'null' => true],
        //     'quantity'         => ['type' => 'int', 'constraint' => 5, 'null' => true],
        //     'file_path'        => ['type' => 'varchar', 'constraint' => 255],
        //     'cover_path'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        //     'user_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        // ]);

        // $this->forge->addKey('book_id', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        // $this->forge->addForeignKey('category_id', 'categories', 'category_id', '', 'CASCADE');

        // $this->forge->createTable('books', true);
    }

    public function down()
    {
        //
    }
}
