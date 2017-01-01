<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timeline_type_id')->unsigned();
            $table->date('start');
            $table->date('end')->nullable();
            $table->timestamps();

            $table->foreign('timeline_type_id')->references('id')->on('timeline_types')->onDelete('cascade');
        });

        Schema::create('timeline_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timeline_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title', 50);
            $table->string('subtitle', 50);
            $table->text('description');

            $table->unique(['timeline_id','locale']);
            $table->foreign('timeline_id')->references('id')->on('timelines')->onDelete('cascade');
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
        Schema::drop('timeline_translations');
        Schema::drop('timelines');
    }
}
