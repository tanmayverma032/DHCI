<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStudyCenterToRegistrations extends Migration
{
    public function up() 
    {
      $fields = [

      'study_center' => [ 
      'type' => "INT",
      'constraint' => 254,
      "after" => "course",
      "null" => null,
      ], 

     ];
     $this->forge->addColumn('registrations', $fields);
    }
    

    public function down()
    {
        $this->forge->dropColumn('registrations', "study_center");
    }
}
