<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRedirectIdToEti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cognition')->table('event_type_indicators', function (Blueprint $table) {
            $table->integer('redirect_id')->nullable()->index(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cognition')->table('event_type_indicators', function (Blueprint $table) {
            //
        });
    }
}