<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToLeadsTable extends Migration
{
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
