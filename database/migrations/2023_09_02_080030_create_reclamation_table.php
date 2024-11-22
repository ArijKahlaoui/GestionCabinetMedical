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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('Subject');
            $table->text('message');
            $table->text('decision')->default('');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('medecin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('medecin_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }
};
