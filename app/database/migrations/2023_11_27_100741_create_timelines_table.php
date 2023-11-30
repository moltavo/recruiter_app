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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->string('recruiter_name');
            $table->string('recruiter_surname');
            $table->string('candidate_name');
            $table->string('candidate_surname');
            $table->timestamps();
            
            // Add foreign key constraints if needed
            // $table->foreign('recruiter_id')->references('id')->on('recruiters')->onDelete('cascade');
            // $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelines');
    }
};
