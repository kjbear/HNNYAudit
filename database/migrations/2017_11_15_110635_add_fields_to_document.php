<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cognition')->table('documents', function (Blueprint $table) {
            $table->integer('document_number')->index();
            $table->integer('editor_id');
            $table->string('status')->index();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cognition')->table('documents', function (Blueprint $table) {
            $table->string('name')->index();
        });

    }
}
