<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviewer_assigneds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rev_stat_id');
            $table->unsignedBigInteger('manu_id');
            $table->unsignedBigInteger('rev_id');
            $table->string('rev_stat_status');
            $table->string('manuscript_id');
            $table->string('rev_fname');
            $table->string('rev_lname');
            $table->timestamps();

            $table->foreign('rev_stat_id')->references('id')->on('reviewed_statuses')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('manu_id')->references('id')->on('manuscripts')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rev_id')->references('id')->on('reviewers')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewer_assigneds');
    }
};
