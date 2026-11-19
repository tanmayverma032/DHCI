<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToMarksheet extends Migration
{
    public function up()
    {

    $fields = [

      'status' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
                'nullable' => true,
                "after" => "doi"

            ],  

     ];
     $this->forge->addColumn('marksheets', $fields);
         
    }

    public function down()
    {
        $this->forge->dropColumn('marksheets', ["status"]);
    }
}
