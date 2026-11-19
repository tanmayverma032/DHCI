<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CoursesTable extends Migration
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

            'program_id' => [
                'type' => 'INT',
                'constraint' => 254,
                'unsigned'   => true,
            ],
 

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ],

            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
            ],

            'duration' => [
                'type' => 'INT',
                'constraint' => 14,
            ],

            'course_fees' => [
                'type' => 'INT',
                'constraint' => 222,
            ],

            'admission_fees' => [
                'type' => 'INT',
                'constraint' => 254,
            ], 

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 555,
            ], 

            'modules' => [
                'type' => 'MEDIUMBLOB', 
                'null' => true
            ], 

            'desc' => [
                    'type' => 'VARCHAR',
                    'constraint' => 555,
                    'after' => 'modules'
                ],

            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('program_id', 'programs', 'id', 'NO ACTION', 'CASCADE');

        $this->forge->createTable('courses');
        
    }

    public function down()
    {
        $this->forge->dropTable('courses');
    }
}
