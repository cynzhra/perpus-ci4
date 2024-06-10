<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        // Category
        // $this->forge->addField([
        //     'category_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
        //     'category_name'    => ['type' => 'varchar', 'constraint' => 255],
        // ]);
        
        // $this->forge->addKey('category_id', true);
        
        // $this->forge->createTable('categories', true);
    }

    public function down()
    {

    }
}
