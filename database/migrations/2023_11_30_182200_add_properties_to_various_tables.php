<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertiesToVariousTables extends Migration
{
    public function up()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });
        Schema::table('employments', function (Blueprint $table) {
            $table->json('properties')->nullable();
        });
    }

    public function down()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('properties');
        });
        Schema::table('employments', function (Blueprint $table) {
            $table->dropColumn('properties');
        });
    }
}
