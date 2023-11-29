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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable(false);
            $table->text("description");
            $table->string("address", 255)->nullable(false);
            $table->string("city", 50)->nullable(false);
            $table->string("province", 50)->nullable(false);
            $table->string("country", 50)->nullable(false);
            $table->decimal('rating', 3, 2);
            $table->string("image_url", 255)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
