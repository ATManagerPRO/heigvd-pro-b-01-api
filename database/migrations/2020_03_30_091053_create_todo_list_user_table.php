<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table between todo_lists and users
        Schema::create('todo_list_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('todo_list_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('permissionLevel');
            $table->timestamps();

            $table->unique(['todo_list_id', 'user_id']);

            // Foreign keys constraints
            $table->foreign('todo_list_id')->references('id')->on('todo_lists')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Table options
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_list_user');
    }
}
