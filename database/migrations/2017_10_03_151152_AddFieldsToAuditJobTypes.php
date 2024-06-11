<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToAuditJobTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audit_job_types', function (Blueprint $table) {
            $table->string('job_class_name')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('inputs')->nullable();
            $table->string('outputs')->nullable();
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_job_types', function (Blueprint $table) {
            //
        });
    }
}
