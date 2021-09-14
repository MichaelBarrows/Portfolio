<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechStacksTable extends Migration
{
    public function up()
    {
        Schema::create('tech_stacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identifier');
            $table->boolean('is_long');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tech_stacks');
    }
}
