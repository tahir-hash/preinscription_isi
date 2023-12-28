<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = Role::create([
            "name" => "ADMINISTRATION",
            "description" => "Membres de l'administration"
        ]);

        $joueur = Role::create([
            "name" => "ETUDIANT",
            "description" => "Etudiant ISI"
        ]);
    }
}
