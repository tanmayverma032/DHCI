<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class StudentCertificatesTable extends Migration
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
                'nullable' => true,
            ],

            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
                'nullable' => true,

            ],

            'sdw_o' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ],

            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'nullable' => true,

            ],

            'duration' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'nullable' => true,

            ],

            'training_center' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'nullable' => true,

            ],

            'center_code' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ],

            'course_period' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ],

            'certificate_number' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ],

            'registration_no' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ],

            'grade' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'nullable' => true,

            ], 

            'doi' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
                'nullable' => true,

            ],
 
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id'); 

        $this->forge->createTable('student_certificates');
    }

    public function down()
    {
        $this->forge->dropTable('student_certificates');
    }
}
