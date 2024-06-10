<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserBookAccess extends Migration
{
    public function up()
    {
        // User Book Access
        // $fields = [
        //     'access_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'book_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        //     'user_id'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        // ];

        // $this->forge->addField($fields);
        // $this->forge->addKey('access_id');
        // $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        // $this->forge->addForeignKey('book_id', 'books', 'book_id', '', 'CASCADE');
        // $this->forge->createTable('user_book_access', true);
    }

    public function down()
    {
        //
    }
}
