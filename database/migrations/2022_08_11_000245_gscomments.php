<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gscomments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comments');
            $table->text('guestname');
            $table->integer('groomservices_id')->unsigned();
            $table->foreign('groomservices_id')->references('id')->on('groomservices')->onDelete('cascade');
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
        Schema::dropIfExists('gscomments');
    }
};
