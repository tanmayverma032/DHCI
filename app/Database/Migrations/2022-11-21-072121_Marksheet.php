<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Marksheet extends Migration
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

            'student_id' => [
                'type' => 'INT',
                'constraint' => 254,
                'unsigned'   => true,
            ],
  
            'theory_marks' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            'practical_marks' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            'project_marks' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            'viva_marks' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            'doi' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
            ], 

            'certificate_number' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
            ],  
 
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id'); 

        $this->forge->createTable('marksheets');
    }

    public function down()
    {
        $this->forge->dropTable('marksheets');
    }
}
