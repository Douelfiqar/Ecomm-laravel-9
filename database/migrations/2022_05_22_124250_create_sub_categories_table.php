<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('category_id');
            $table->string('SubCategory_name_en');
            $table->string('SubCategory_name_fr');
            $table->string('SubCategory_slug_en');
            $table->string('SubCategory_slug_fr');
            $table->string('SubCategory_image');
            // $table->foreign('category_id')->references('id')->on('categories')->constrained()->onUpdate('cascade')
            // ->onDelete('cascade');
            // ->onDelete('cascade')->onUpdate('cascade')
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
        Schema::dropIfExists('sub_categories');
    }
}
