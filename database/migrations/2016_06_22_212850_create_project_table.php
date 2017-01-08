<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->boolean('isFile')->default(false);
            $table->string('imagePath');
            $table->boolean('enabled');
            $table->timestamps();
        });

        Schema::create('project_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->text('description');
            $table->string('action');

            $table->unique(['project_id','locale']);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::drop('project_translations');
        Schema::drop('projects');
    }
}
