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
        Schema::create('diadiem', function (Blueprint $table) {
            $table->id();
            $table->string('tendiadiem')->unique();
            $table->string('tendiadiem_slug');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('diadiem');
    }
};
