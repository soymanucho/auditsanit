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
        Schema::create('mod_typ_mod_typ_cat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mod_typ_id')->unsigned();
            $table->bigInteger('mod_typ_cat_id')->unsigned();
            $table->decimal('price',12,2);
            $table->timestamps();
        });
        Schema::table('mod_typ_mod_typ_cat', function (Blueprint $table) {
            $table->foreign('mod_typ_cat_id')->references('id')->on('mod_typ_cat');
            $table->foreign('mod_typ_id')->references('id')->on('module_types');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mod_typ_mod_typ_cat');
    }
}
