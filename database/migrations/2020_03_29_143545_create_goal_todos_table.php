<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('goal_id');
            $table->integer('quantityDone')->nullable();
            $table->timestamp('dateTimeDone')->nullable();
            $table->timestamps();

            // Foreign keys constraints
            // Goal deleted => goalTodo NOT deleted
            $table->foreign('goal_id')
                ->references('id')
                ->on('goals')
                ->onDelete('set null');

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
        Schema::dropIfExists('goal_todos');
    }
}
