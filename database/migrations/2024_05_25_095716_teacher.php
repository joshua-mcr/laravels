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
        //
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code');
            $table->string('name');
            $table->date('description');
            $table->string('instructor');
            $table->string('schedule');
            $table->integer('grades');
            $table->double('prelims');
            $table->double('midterms');
            $table->double('prefinals');
            $table->double('finals');
            $table->double('average_grade');
            $table->string('remarks');
            $table->string('date_taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
