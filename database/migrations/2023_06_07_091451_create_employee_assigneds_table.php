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
        Schema::create('employee_assigneds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('manu_id');
            $table->string('manuscript_id');
            $table->unsignedBigInteger('user_id');
            $table->string('emp_username');
            $table->string('description');
            $table->string('file');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')
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
        Schema::dropIfExists('employee_assigneds');
    }
};
