<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsToApplyFranchise extends Migration
{
    public function up()
    {
     //    $fields = [

     //  'center_code' => [ 
     //  'type' => "INT",
     //  'constraint' => 254,
     //  "after" => "phone",
     //  "null" => null,
     //  ],
     //  'approval' => [ 
     //  'type' => "INT",
     //  "after" => "phone",
     //  'constraint' => 10, 
     //  "null" => null,
      
     //  ],

     // ];
     // $this->forge->addColumn('franchise_apply', $fields);
    }
    

    public function down()
    {
       // $this->forge->dropColumn('franchise_apply', ["approval", "center_code"]);
    }
}
