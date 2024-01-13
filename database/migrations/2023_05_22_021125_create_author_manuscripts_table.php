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
        Schema::create('author_manuscripts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('au_id');
            $table->unsignedBigInteger('manu_id');
            $table->string('manuscript_id');
            $table->string('au_manu_Lname');
            $table->string('au_manu_email');
            $table->string('au_manu_affiliation');
            $table->timestamps();

            $table->foreign('au_id')->references('id')->on('authors')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('manu_id')->references('id')->on('manuscripts')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_manuscripts');
    }
};
