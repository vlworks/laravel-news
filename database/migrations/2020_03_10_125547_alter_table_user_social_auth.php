<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserSocialAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
           $table->string('social_id')
               ->default('')
               ->comment('ID в соцсети');
           $table->string('social')
               ->default('site')
               ->comment('Тип авторизации');
           $table->string('avatar')
               ->default('')
               ->comment('Аватар');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['social_id', 'social', 'avatar']);
        });
    }
}
