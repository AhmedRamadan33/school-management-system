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
        Schema::create('teacher_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sections_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('teacher_sections');
    }
};
