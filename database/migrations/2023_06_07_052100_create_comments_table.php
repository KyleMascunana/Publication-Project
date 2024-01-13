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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rev_id');
            $table->string('com_rev_fname');
            $table->string('com_rev_lname');
            $table->string('com_comment');
            $table->string('com_status');
            $table->string('file');
            $table->timestamps();


            $table->foreign('rev_id')->references('id')->on('reviewers')
            ->onUpdate('cascade')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
