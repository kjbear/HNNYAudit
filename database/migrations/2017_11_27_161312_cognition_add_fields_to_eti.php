<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CognitionAddFieldsToEti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cognition')->table('event_type_indicators', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('label')->nullable();
            $table->boolean('isHealthIndicator')->nullable();
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
