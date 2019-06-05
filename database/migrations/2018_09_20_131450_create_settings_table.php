<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_content');
            $table->string('admin_email');
            $table->string('primary_contact');
            $table->string('secondary_contact');
            $table->string('company_loaction');
            $table->string('website_email');
            $table->string('company_address');
            $table->string('footer_content');
            $table->string('facebook_link');
            $table->string('youtube_link');
            $table->string('instagram_link');
            $table->string('header_logo');
            $table->string('footer_logo');
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
        Schema::dropIfExists('settings');
    }
}
