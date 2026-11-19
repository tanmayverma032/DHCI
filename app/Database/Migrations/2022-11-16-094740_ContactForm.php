<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
class ContactForm extends Migration
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

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
            ],

            'number' => [
                'type' => 'VARCHAR',
                'constraint' => 14,
            ],

            'selected_course' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ],

            'message' => [
                'type' => 'VARCHAR',
                'constraint' => 555,
            ], 

            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('contact_form');
        
    }

    public function down()
    {
        $this->forge->dropTable('contact_form');
    }
}


