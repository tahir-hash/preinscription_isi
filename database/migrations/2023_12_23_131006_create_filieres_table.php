<?php

use App\Models\Department;
use App\Models\Niveau;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->longText('image')->nullable();
            $table->foreignIdFor(Department::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Niveau::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
