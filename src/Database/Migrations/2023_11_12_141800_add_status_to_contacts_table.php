<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToContactsTable extends Migration
{
    public function up()
    {
        Schema::connection('portfolio')->table('contacts', function (Blueprint $table) {
            $table->string('status')->after('message')->default('new');
            $table->text('notes')->after('status')->nullable();
        });
    }

    public function down()
    {
        Schema::connection('portfolio')->table('contacts', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('notes');
        });
    }
}
