<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('parent_name');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('origin_name');
            $table->string('type');
            $table->integer('size');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attachments');
    }

}
