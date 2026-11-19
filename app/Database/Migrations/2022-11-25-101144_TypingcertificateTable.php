<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TypingcertificateTable extends Migration
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
            ],

            'student_name' => [
                'type' => 'VARCHAR',
                'constraint' => 55,
            ],

            'sdw_o' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
            ],

            'duration' => [
                'type' => 'INT',
                'constraint' => 2,
            ],

            'training_center' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
            ],

            'center_code' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'course_period' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'certificate_number' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'registration_no' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'english' => [
                'type' => 'INT',
                'constraint' => 3,
            ],

            'hindi' => [
                'type' => 'INT',
                'constraint' => 3,
            ],

            'doi' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
            ],   
 
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id'); 

        $this->forge->createTable('typingcertificates');
    }

    public function down()
    {
        $this->forge->dropTable('typingcertificates');
    }
}
