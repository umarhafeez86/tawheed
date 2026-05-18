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
        Schema::create('hotelslogos', function (Blueprint $table) {
            $table->id("hotelslogos_id");
            $table->string("hotelslogos_name");
            $table->longtext("hotelslogos_link")->nullable();
            $table->double("hotelslogos_status",1);
            $table->double("hotelslogos_sort")->nullable();
            $table->string("hotelslogos_image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotelslogos');
    }
};
