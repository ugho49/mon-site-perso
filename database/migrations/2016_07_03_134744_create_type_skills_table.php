<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('skill_type_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_type_id')->unsigned();
            $table->string('locale')->index();

            $table->string('libelle');

            $table->unique(['skill_type_id','locale']);
            $table->foreign('skill_type_id')->references('id')->on('skill_types')->onDelete('cascade');
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
        Schema::drop('skill_type_translations');
        Schema::drop('skill_types');
    }
}
