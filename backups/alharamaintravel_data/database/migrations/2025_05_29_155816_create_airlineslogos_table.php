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
        Schema::create('airlineslogos', function (Blueprint $table) {
            $table->id("airlineslogos_id");
            $table->string("hairlineslogos_name");
            $table->longtext("airlineslogos_link")->nullable();
            $table->double("airlineslogos_status",1);
            $table->double("airlineslogos_sort")->nullable();
            $table->string("airlineslogos_image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airlineslogos');
    }
};
