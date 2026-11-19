<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApprovalColumnToRegistrations extends Migration
{
    public function up()
    {
     //  $fields = [
     //  'approval' => [ 
     //  'type' => "INT",
     //  'constraint' => 10,
     //  "after" => "account_create"
     //  ],
     // ];
     // $this->forge->addColumn('registrations', $fields);
    }

    public function down()
    {
      //  $this->forge->dropColumn('registrations', "approval");
    }
}
