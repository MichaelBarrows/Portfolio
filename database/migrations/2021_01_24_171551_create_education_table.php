<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('course_name');
            $table->string('grade');
            $table->string('start_date');
            $table->string('end_date');
            $table->longText('description')->nullable();
            $table->string('project_title')->nullable();
            $table->json('tech_stack')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('education');
    }
}
