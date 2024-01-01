<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Filiere;
use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'libelle' => 'Département Génie-Informatique',
                'Licence' => [
                    [
                        'libelle' => 'Génie Logiciel',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Informatique de Gestion',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Infographie & Multimédia',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Géomatique & Développement d\'application',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Marketing & Communication Digital',
                        'description' => 'k'
                    ]
                ],
                'Master' => [
                    [
                        'libelle' => 'Génie Logiciel',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Informatique de Gestion',
                        'description' => 'k'
                    ]
                ]
            ],
            [
                'libelle' => 'Département Réseaux & Systèmes',
                'Licence' => [
                    [
                        'libelle' => 'Réseaux informatiques',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Réseaux Télécoms',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Cyber sécurité',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Systémes embarqués et IOT',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Energies Renouvelables',
                        'description' => 'k'
                    ]
                ],
                'Master' => [
                    [
                        'libelle' => 'Réseaux & Systémes informatiques',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Réseaux Télécommunications',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Sécurité des Sytémes d\'informations et Monétiques',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Réseaux Télécommunications',
                        'description' => 'k'
                    ]
                ]
            ],
            [
                'libelle' => 'Département Gestion',
                'Licence' => [
                    [
                        'libelle' => 'Finance & Comptabilité',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Commerce International',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Banque Finance Assurance',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Assistanat de Direction',
                        'description' => 'k'
                    ]
                ],
                'Master' => [
                    [
                        'libelle' => 'Finance',
                        'description' => 'k'
                    ],
                    [
                        'libelle' => 'Banque Assurance',
                        'description' => 'k'
                    ]
                ]
            ]
        ];

        //insertion
        foreach ($departments as $departmentData) {

            $department = Department::create([
                'libelle' => $departmentData['libelle']
            ]);

            foreach (['Licence', 'Master'] as $level) {
                foreach ($departmentData[$level] as $filiere) {
                    $niveau_id = Niveau::where('libelle', $level)->first()->id;

                    Filiere::create([
                        'libelle' => $filiere['libelle'],
                        'description' => $filiere['description'],
                        'department_id' => $department->id,
                        'niveau_id' => $niveau_id
                    ]);
                }
            }
        }
    }
}
