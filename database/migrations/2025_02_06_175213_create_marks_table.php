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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('gpa');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('science');
            $table->string('social_studies');
            $table->string('math');
            $table->string('english');
            $table->string('geography');
            $table->string('physics');
            $table->string('history');
            $table->string('chemistry');
            $table->string('biology');
            $table->string('computer');
            $table->string('arabic');
            $table->string('french');
            $table->string('german');
            $table->string('technology');
            $table->string('religion');
            $table->string('statistic');
            $table->string('psychology');
            $table->string('philosophy');
            $table->string('art');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
};
