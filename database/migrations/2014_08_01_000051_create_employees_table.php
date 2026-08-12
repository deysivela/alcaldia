<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id')->unsigned();
            $table->integer('charge_id')->unsigned();
            // $table->integer('salarie_id')->unsigned();
            $table->string('type_employee');
            $table->string('name');
            $table->string('last_name');
            $table->string('sex');
            $table->string('address');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('photo')->default('default.jpg');
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('charge_id')->references('id')->on('charges')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            // $table->foreign('salarie_id')->references('id')->on('salaries')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
