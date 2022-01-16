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
            $table->id();
            //отображение на странице курсов
            $table->string('title');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('author');
            $table->bigInteger('price');
            $table->string('cover');
            $table->text('description');
            
            //страница самого курса
            $table->text('introduction');
            $table->string('video');
            $table->text('block1')->nullable();
            $table->string('img1')->nullable();
            $table->text('block2')->nullable();
            $table->string('img2')->nullable();

            //прикрепленные файлы
            $table->string('exercise')->nullable();
            $table->string('file')->nullable();

            //id автора курса
            $table->foreignId('author_id')->references('id')->on('users');
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
