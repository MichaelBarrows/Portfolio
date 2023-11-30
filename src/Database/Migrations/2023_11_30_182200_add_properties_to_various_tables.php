<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertiesToVariousTables extends Migration
{
    public function up()
    {
        Schema::connection('portfolio')->table('education', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });
        Schema::connection('portfolio')->table('employments', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });
    }

    public function down()
    {
        Schema::connection('portfolio')->table('education', function (Blueprint $table) {
            $table->dropColumn('properties');
        });
        Schema::connection('portfolio')->table('employments', function (Blueprint $table) {
            $table->dropColumn('properties');
        });
    }
}
