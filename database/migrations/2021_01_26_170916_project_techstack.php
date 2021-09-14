<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTechstack extends Migration
{
    public function up()
    {
        Schema::create('project_tech_stack', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('tech_stack_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tech_stack');
    }
}
