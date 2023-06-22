<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('title');


            $table->unsignedBigInteger('id_city');
            $table->foreign('id_city')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');

            $table->bigInteger('mileage');
            $table->bigInteger('price');
            $table->text('description');
            $table->boolean('state');
            $table->json('photo');

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};