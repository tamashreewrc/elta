<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToTableSer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_category_contacts', function (Blueprint $table) {
            $table->integer('sub_category_id')->unsigned();
            $table->string('comment');
            $table->smallInteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_category_contacts', function (Blueprint $table) {
            //
        });
    }
}
