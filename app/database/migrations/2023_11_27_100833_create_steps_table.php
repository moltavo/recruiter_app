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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timeline_id');
            $table->string('category');
            $table->string('status_category');
            $table->unsignedBigInteger('category_1');
            $table->unsignedBigInteger('category_2');
            $table->unsignedBigInteger('category_3');
            $table->unsignedBigInteger('status_category_1');
            $table->unsignedBigInteger('status_category_2');
            $table->unsignedBigInteger('status_category_3');
            $table->timestamps();
            
            // Add foreign key constraints if needed
            $table->foreign('timeline_id')->references('id')->on('timelines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
};
