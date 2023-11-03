<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLinksTable extends Migration
{
    public function up()
    {
        Schema::connection('portfolio')->create('project_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->string('name');
            $table->string('text');
            $table->json('icon');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('portfolio')->dropIfExists('project_links');
    }
}
