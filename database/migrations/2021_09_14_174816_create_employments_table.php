<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('description');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('employments');
    }
}
