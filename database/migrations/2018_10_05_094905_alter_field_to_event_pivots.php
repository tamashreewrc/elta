<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFieldToEventPivots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_pivots', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('video_link');
            $table->smallInteger('type')->default('1');
            $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_pivots', function (Blueprint $table) {
            //
        });
    }
}
