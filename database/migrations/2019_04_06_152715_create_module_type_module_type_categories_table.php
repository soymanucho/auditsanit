<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTypeModuleTypeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_type_module_type_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('module_type_id');
            $table->bigInteger('module_type_category_id');
            $table->decimal('price',12,2);
            $table->timestamps();
        });
        Schema::table('module_type_module_type_categories', function (Blueprint $table) {
            $table->foreign('module_type_category_id')->references('id')->on('module_type_categories');
            $table->foreign('module_type_id')->references('id')->on('module_type_id');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_type_module_type_categories');
    }
}
