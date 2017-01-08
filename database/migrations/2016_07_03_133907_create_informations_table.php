<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 25)->unique();
            $table->text('value');
            $table->timestamps();
        });

        Schema::create('information_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id')->unsigned();
            $table->string('locale')->index();

            $table->text('value_locale');

            $table->unique(['information_id','locale']);
            $table->foreign('information_id')->references('id')->on('informations')->onDelete('cascade');
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
        Schema::drop('information_translations');
        Schema::drop('informations');
    }
}
