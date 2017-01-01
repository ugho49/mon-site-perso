<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_type_id')->unsigned();
            $table->integer('percentage');
            $table->string('color_hexa')->default('#5E8A9F');
            $table->timestamps();
            
            $table->foreign('skill_type_id')->references('id')->on('skill_types')->onDelete('cascade');
        });

        Schema::create('skill_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->string('locale')->index();

            $table->string('libelle');

            $table->unique(['skill_id','locale']);
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->foreign('locale')->references('locale')->on('translations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skill_translations');
        Schema::drop('skills');
    }
}
