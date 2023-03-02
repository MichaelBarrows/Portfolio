<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pretty_url');
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('image')->nullable();
            $table->string('text_logo')->nullable();
            $table->string('fa_icon_logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
