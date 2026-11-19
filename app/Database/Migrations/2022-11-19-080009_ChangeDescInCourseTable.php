<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeDescInCourseTable extends Migration
{
    public function up()
    {
      $fields = [
      'desc' => [ 
      'type' => 'MEDIUMBLOB',
      ],
     ];
     $this->forge->modifyColumn('courses', $fields);
    }

    public function down()
    {
        $fields = [
        'desc' => [ 
        'type' => 'VARCHAR',
        'constraint' => 555,
        ],
      ];
     $this->forge->modifyColumn('courses', $fields);
    }
}
