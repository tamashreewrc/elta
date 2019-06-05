<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('box_one_title');
            $table->string('box_one_desc');
            $table->string('box_one_icon');
            $table->string('box_two_title');
            $table->string('box_two_desc');
            $table->string('box_two_icon');
            $table->string('middle_section_title');
            $table->string('box_three_title');
            $table->string('box_three_desc');
            $table->string('box_three_icon');
            $table->string('video_title');
            $table->string('video_text');
            $table->string('video_link');
            $table->string('middle_section_image');
            $table->text('middle_section_content');
            $table->text('company_desc');
            $table->string('company_image');
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
        Schema::dropIfExists('home_details');
    }
}
