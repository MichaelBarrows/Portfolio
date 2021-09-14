<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTextsTable extends Migration
{
    public function up()
    {
        Schema::create('project_texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('format');
            $table->integer('order');
            $table->longText('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_texts');
    }
}
