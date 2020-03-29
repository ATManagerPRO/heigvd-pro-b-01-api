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
            $table->unsignedBigInteger('todo_list_id');
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
            // TodoList deleted => todos NOT deleted (for statistic purposes)
            $table->foreign('todo_list_id')->references('id')->on('todo_lists')->onDelete('set null');

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
