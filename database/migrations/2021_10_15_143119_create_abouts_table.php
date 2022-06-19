<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('welcome_note');
            $table->string('about_image');
            $table->string('leadership_name');
            $table->string('leadership_position')->nullable();
            $table->string('leadership_facebook')->nullable();
            $table->string('leadership_twitter')->nullable();
            $table->string('leadership_instragram')->nullable();
            $table->string('leadership_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
