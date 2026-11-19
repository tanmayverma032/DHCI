<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Programs extends Migration
{
    public function up()
    { 
       
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 254,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
            ],

            'desc' => [
                'type' => 'VARCHAR',
                'constraint' => 555,
            ],

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ], 

            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('programs');
        
    }

    public function down()
    {
        $this->forge->dropTable('programs');
    }
}
