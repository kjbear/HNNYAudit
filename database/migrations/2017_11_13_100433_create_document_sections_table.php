<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cognition')->create('document_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->index();
            $table->text('title');
            $table->text('body');
            $table->integer('author_id');
            $table->integer('editor_id');
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
        Schema::dropIfExists('document_sections');
    }
}
