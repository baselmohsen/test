<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();

            $table->foreignId('cat_id')->constrained('cats');
           
            $table->foreignId('trainer_id')->constrained('trainers');           
            
            $table->string('name');
            $table->string('small_desc');
            $table->text('desc');
            $table->integer('price');
            $table->string('img') ;
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
        Schema::dropIfExists('courses');
    }
}
