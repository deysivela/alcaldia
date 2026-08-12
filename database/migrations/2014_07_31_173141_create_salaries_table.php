<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salcat_id')->unsigned();
            $table->integer('clase_id')->unsigned();
            $table->string('level_salary');
            $table->string('denomination');
            $table->integer('nro_item');
            $table->double('salary_monthly');
            $table->double('salary_total');
            $table->timestamps();

            $table->foreign('salcat_id')->references('id')->on('salcats')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('clase_id')->references('id')->on('clases')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
