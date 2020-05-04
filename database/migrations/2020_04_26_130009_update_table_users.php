<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('googleToken', 'googleId');
            $table->renameColumn('pseudo', 'email');
            $table->string('tokenAPI', env("AUTH_TOKEN_LENGTH"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('googleId', 'googleToken');
            $table->renameColumn('email', 'pseudo');
            $table->dropColumn('tokenAPI');
        });
    }
}
