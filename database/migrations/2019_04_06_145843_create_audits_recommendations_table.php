<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditsRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_recommendations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('recommendation_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('audit_recommendations', function (Blueprint $table) {
            $table->foreign('recommendation_id')->references('id')->on('recommendations');
            $table->foreign('audit_id')->references('id')->on('audits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_recommendations');
    }
}
