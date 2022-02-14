<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->longText('file_name');
            $table->unsignedBigInteger('parent_folder');
            $table->unsignedBigInteger('post_by');
            $table->unsignedBigInteger('send_to')->nullable();
            $table->unsignedBigInteger('current_person')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('post_by')->references('id')->on('users');
            $table->foreign('send_to')->references('id')->on('users');
            $table->foreign('current_person')->references('id')->on('users');
            $table->foreign('parent_folder')->references('id')->on('folders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
