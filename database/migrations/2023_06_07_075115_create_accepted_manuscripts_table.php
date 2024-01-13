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
        Schema::create('accepted_manuscripts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->string('emp_username');
            $table->string('emp_email');
            $table->unsignedBigInteger('rev_stat_id');
            $table->string('rev_stat_status');
            $table->unsignedBigInteger('manu_id');
            $table->string('manuscript_id');
            $table->unsignedBigInteger('user_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('rev_stat_id')->references('id')->on('reviewed_statuses')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('manu_id')->references('id')->on('manuscripts')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accepted_manuscripts');
    }
};
