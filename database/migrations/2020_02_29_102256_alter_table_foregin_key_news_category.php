<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableForeginKeyNewsCategory extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
}
