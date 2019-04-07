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
            $table->bigInteger('mod_typ_mod_typ_cat_id')->unsigned();
            $table->decimal('price',12,2);
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('recommended_mod_typ_mod_typ_cat_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('expedient_modules', function (Blueprint $table) {
            $table->foreign('mod_typ_mod_typ_cat_id')->references('id')->on('mod_typ_mod_typ_cat');
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('recommended_mod_typ_mod_typ_cat_id')->references('id')->on('mod_typ_mod_typ_cat');
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
