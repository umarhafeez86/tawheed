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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id("destinations_id");
            $table->string("destinations_name");
            $table->string("destinations_details")->nullable();
            $table->string("destinations_title")->nullable();
            $table->string("destinations_descp")->nullable();
            $table->string("destinations_keyword")->nullable();
            $table->double("destinations_status",1);
            $table->double("destinations_sort")->nullable();
            $table->string("destinations_image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
