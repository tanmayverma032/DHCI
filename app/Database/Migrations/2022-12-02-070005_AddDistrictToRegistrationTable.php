<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDistrictToRegistrationTable extends Migration
{
    public function up()
        {
      $fields = [

      'district' => [ 
      'type' => "VARCHAR",
      'constraint' => 50,
      "after" => "address",
      "null" => null,
      ], 

     ];
     $this->forge->addColumn('registrations', $fields);
    }

    public function down()
    {
         $this->forge->dropColumn('//', "study_center");
    }
}


 