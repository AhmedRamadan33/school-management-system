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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            //Fatherinformation
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_phone');
            $table->string('father_job');
            $table->string('father_address');
            $table->foreignId('father_nationality')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('father_bloodGroup')->references('id')->on('bloodGroups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('father_religion')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');

            //Mother information
            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->string('mother_address');
            $table->foreignId('mother_nationality')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mother_bloodGroup')->references('id')->on('bloodGroups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mother_religion')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('parents');
    }
};
