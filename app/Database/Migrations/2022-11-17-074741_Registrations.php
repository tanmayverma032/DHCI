<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Registrations extends Migration
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

            'registration_no' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true
            ],

            'session' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],

            'course' => [
                'type' => 'INT',
                'constraint' => 222,
                'null' => true
            ],

            'state' => [
                'type' => 'INT',
                'constraint' => 111,
                'null' => true
            ],

            'fname' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'lname' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'father_name' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'mother_name' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'dob' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true
            ],

            'pincode' => [
                'type' => 'INT',
                'constraint' => 111,
                'null' => true
            ],

            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'religion' => [
                'type' => 'INT',
                'constraint' => 111,
                'null' => true
            ],

            'nationality' => [
                'type' => 'INT',
                'constraint' => 111,
                'null' => true
            ],

            'aadhar_number' => [
                'type' => 'INT',
                'constraint' => 111,
                'null' => true
            ],

            'email_address' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'null' => true
            ],

            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],

            'gaurdian_contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],

            '10th_board' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            '10th_year' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true
            ],

            '10th_percent' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            '12th_board' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            '12th_year' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true
            ],

            '12th_percent' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'graduation_university' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'graduation_year' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true
            ],

            'graduation_percent' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'date_of_registration' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true
            ],

            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
                'null' => true
            ],

            'account_create' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 35,
                'null' => true
            ], 


            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('registrations');
        
    }

    public function down()
    {
         $this->forge->dropTable('registrations');
    }
}
