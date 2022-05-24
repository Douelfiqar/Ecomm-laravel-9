<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('category_id');
            $table->bigInteger('sub_category_id');
            $table->string('SubSubCategory_name_en');
            $table->string('SubSubCategory_name_fr');
            $table->string('SubSubCategory_slug_en');
            $table->string('SubSubCategory_slug_fr');
            $table->string('SubSubCategory_image');
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
        Schema::dropIfExists('sub_sub_categories');
    }
}
