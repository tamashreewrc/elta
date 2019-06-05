<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEltaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elta_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('elta_letter');
            $table->string('elta_word');
            $table->string('elta_symbol');
            $table->string('elta_parts_of_speech');
            $table->string('elta_word_details');
            $table->string('elta_synonyms')->nullable();
            $table->text('description_1');
            $table->text('description_2');
            $table->smallInteger('status')->default('1');
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
        Schema::dropIfExists('elta_details');
    }
}
