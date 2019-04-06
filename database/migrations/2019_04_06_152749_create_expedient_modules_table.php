<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedient_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('module_type_module_type_category_id')->unsigned();
            $table->decimal('price',12,2);
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('recommended_module_type_module_type_category_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('expedient_modules', function (Blueprint $table) {
            $table->foreign('module_type_module_type_category_id')->references('id')->on('module_type_module_type_category');
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('recommended_module_type_module_type_category_id')->references('id')->on('module_type_module_type_category');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedient_modules');
    }
}
