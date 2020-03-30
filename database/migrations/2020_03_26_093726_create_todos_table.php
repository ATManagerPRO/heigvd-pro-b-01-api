<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('todoList_id');
            $table->unsignedBigInteger('user_id')->nullable(); // User who is assigned to the task
            $table->string('title', 50);
            $table->text('details')->nullable();
            $table->date('dueDate')->nullable();
            $table->dateTime('dateTimeDone')->nullable();
            $table->dateTime('reminderDateTime')->nullable();
            $table->unsignedInteger('interval'); // Unit (day, week, ...)
            $table->unsignedInteger('intervalValue'); // Amount (1,2, ...)
            $table->date('intervalEndDate')->nullable();
            $table->timestamps();

            // Foreign keys constraints
            $table->foreign('todoList_id')->references('id')->on('todo_lists')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('todos');
    }
}
