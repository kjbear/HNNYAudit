<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cognition')->table('document_sections', function (Blueprint $table) {
            $table->integer('document_id')->index();
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('cognition')->table('document_sections', function (Blueprint $table) {
            $table->dropColumn('document_id');
        }); 
    }
}
