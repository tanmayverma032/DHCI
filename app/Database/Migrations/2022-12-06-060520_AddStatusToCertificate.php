<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToCertificate extends Migration
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
     $this->forge->addColumn('student_certificates', $fields);
         
    }

    public function down()
    {
        $this->forge->dropColumn('student_certificates', ["status"]);
    }
}
