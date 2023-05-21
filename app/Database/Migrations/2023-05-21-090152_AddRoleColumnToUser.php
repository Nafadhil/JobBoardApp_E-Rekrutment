<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleColumnToUser extends Migration
{
    public function up()
    {
        $fields = [
            "role" => [
                "type" => "int",
                "null" => true,
                "default" => 2,
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'role');
    }
}