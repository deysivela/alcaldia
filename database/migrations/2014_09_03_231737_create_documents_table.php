<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('categorie')->nullable();
            $table->string('cod')->nullable()->unique();
            $table->string('entity')->nullable();
            $table->mediumText('description')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('file')->nullable();
            // $table->string('photo')->nullable();
            $table->string('name_document')->nullable();
            $table->string('data_document')->nullable();
            $table->string('statu')->nullable();
            $table->string('publish')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            // $table->foreign('categorie_id')->references('id')->on('categories')
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
        Schema::dropIfExists('documents');
    }
}
