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
        Schema::create('post_comment_image', function (Blueprint $table) {
            $table->id();
            $table->binary('image_data');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('comment_id');
           
            $table->timestamps();

            $table->foreign('comment_id')->references('id')->on('post_comment')->onDelete('cascade');

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
