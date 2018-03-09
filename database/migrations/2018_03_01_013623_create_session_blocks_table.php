<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id');
            $table->string('name', 50);
            $table->string('start_time');
            $table->string('end_time');
            $table->tinyinteger('isBreak')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_blocks');
    }
}
