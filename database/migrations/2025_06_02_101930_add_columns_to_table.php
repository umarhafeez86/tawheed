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
        Schema::table('servicepackages', function (Blueprint $table) {
            //
            $table->string("servicepackages_featured_image")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicepackages', function (Blueprint $table) {
            //
            $table->string("servicepackages_featured_image")->nullable();
        });
    }
};
