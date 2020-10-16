<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->Integer('parent_id');
            $table->Integer('section_id');
            $table->String('category_name');
            $table->String('category_image');
            $table->float('category_discount');
            $table->text('description');
            $table->String('url');
            $table->String('meta_title');
            $table->String('meta_description');
            $table->String('meta_keywords');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('categories');
    }
}
