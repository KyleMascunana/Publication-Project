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
        Schema::create('reviewed_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manu_id');
            $table->string('manuscript_id');
            $table->unsignedBigInteger('au_id');
            $table->string('au_fname');
            $table->string('au_lname');
            $table->unsignedBigInteger('user_id');
            $table->string('rev_stat_status');
            $table->timestamps();

            $table->foreign('manu_id')->references('id')->on('manuscripts')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('au_id')->references('id')->on('authors')
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
        Schema::dropIfExists('reviewed_statuses');
    }
};
