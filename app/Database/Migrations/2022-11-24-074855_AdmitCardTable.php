<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AdmitCardTable extends Migration
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
  
            'card_number' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'reg_no' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'exam_center' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ],

            'exam_date' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],

            'exam_time' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
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

        $this->forge->createTable('admitcards');
    }

    public function down()
    {
        $this->forge->dropTable('admitcards');
    }
}
