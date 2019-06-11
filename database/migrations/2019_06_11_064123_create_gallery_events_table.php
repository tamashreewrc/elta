<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_type_id')->unsigned();
            $table->string('event_name');
            $table->string('event_date');
            $table->string('event_location');
            $table->string('event_icon');
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
        Schema::dropIfExists('gallery_events');
    }
}
