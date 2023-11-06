<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisibleToProjectsTable extends Migration
{
    public function up()
    {
        Schema::connection('portfolio')->table('projects', function (Blueprint $table) {
            $table->boolean('visible')->default(false);
        });
    }

    public function down()
    {
        Schema::connection('portfolio')->table('projects', function (Blueprint $table) {
            $table->dropColumn('visible');
        });
    }
}
