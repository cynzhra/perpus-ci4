<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookActions extends Migration
{
    public function up()
    {
        // Book Actions
        // $this->forge->addField([
        //     'action_id'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'book_id'          => ['type' => 'varchar', 'constraint' => 255, 'unsigned' => true],
        //     'user_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        //     'action_type'      => ['type' => 'enum', 'null' => true],
        //     'action_date'      => ['type' => 'timestamp', 'constraint' => 5, 'null' => false],
        // ]);

        // $this->forge->addKey('action_id', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        // $this->forge->addForeignKey('book_id', 'books', 'book_id', '', 'CASCADE');

        // $this->forge->createTable('book_actions', true);
    }

    public function down()
    {
        //
    }
}
