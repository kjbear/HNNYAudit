<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentKeyToDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::connection('cognition')->table('documents', function (Blueprint $table) {
            $table->string('key',255)->index();
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
            $table->dropColumn('key');
        });
    }
}
