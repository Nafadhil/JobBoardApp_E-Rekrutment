<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "position" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "location" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
            "end_date" => [
                "type" => "VARCHAR",
                "constraint" => "200",
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('jobs', true); //If NOT EXISTS create table jobs
    }

    public function down()
    {
        $this->forge->dropTable('jobs', true); //If Exists drop table jobs
    }
}