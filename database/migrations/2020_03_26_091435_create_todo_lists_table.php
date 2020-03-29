<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->string('title', 50);
            $table->timestamps();

            // Foreign keys constraints
            // User deleted => todoList deleted
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Folder deleted => todoList NOT deleted
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('set null');

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
        Schema::dropIfExists('todo_lists');
    }
}
