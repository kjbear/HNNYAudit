<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_runs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->string('type')->index();
            $table->string('status')->index();
            $table->string('created_by')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_runs');
    }
}
