<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveContacctIdFromApplyFranchise extends Migration
{
    public function up()
    {
       // $this->forge->dropColumn('franchise_apply', "contact_id");
    }

    public function down()
    {
       //  $this->forge->dropColumn('franchise_apply', "contact_id");
    }
}
