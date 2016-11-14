<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->primary()->unsigned();
            $table->string('ua')->nullable();
            $table->string('ip')->nullable();
            $table->string('ref')->nullable();
            $table->string('param1')->nullable();
            $table->string('param2')->nullable();
            $table->integer('error')->unsigned()->default(0);
            $table->boolean('bad_domain')->default(false);
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('click');
    }
}
