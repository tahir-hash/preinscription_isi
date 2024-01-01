<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les niveaux et leurs sous-niveaux
        $niveaux = [
            [
                'libelle' => 'Licence',
                'sous_niveaux' => [
                    ['libelle' => 'Licence 1'],
                    ['libelle' => 'Licence 2'],
                    ['libelle' => 'Licence 3'],
                ],
            ],
            [
                'libelle' => 'Master',
                'sous_niveaux' => [
                    ['libelle' => 'Master 1'],
                    ['libelle' => 'Master 2'],
                ],
            ],
        ];

        //insertion
        foreach ($niveaux as $niveauData) {
            $niveau = Niveau::create([
                'libelle' => $niveauData['libelle'],
            ]);

            foreach ($niveauData['sous_niveaux'] as $sousNiveauData) {
                $niveau->sousNiveaux()->create([
                    'libelle' => $sousNiveauData['libelle'],
                ]);
            }
        }
    }
}
