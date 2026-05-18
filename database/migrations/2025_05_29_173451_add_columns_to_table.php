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
            $table->double("destinations_id")->nullable();
            $table->string("custom_label")->nullable();
            $table->double("destination_hotelinfos_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicepackages', function (Blueprint $table) {
            //
            $table->dropColumn(['destinations_id','custom_label','destination_hotelinfos_id']);
        });
    }
};
