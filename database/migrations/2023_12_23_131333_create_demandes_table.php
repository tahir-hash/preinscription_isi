<?php

use App\Models\Filiere;
use App\Models\SousNiveau;
use App\Models\User;
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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->boolean('statut')->nullable();

            $table->foreignIdFor(Filiere::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(SousNiveau::class)
                ->constrained('sous_niveaux')
                ->cascadeOnDelete();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
