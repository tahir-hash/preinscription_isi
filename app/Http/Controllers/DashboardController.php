<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $enCours = Demande::where('statut', null)->count();
        $annulees = Demande::where('statut', false)->count();
        $validees = Demande::where('statut', true)->count();

        $dataForChart = [
            'labels' => ['Demandes en cours', 'Demandes annulées', 'Demandes validées'],
            'series' => [$enCours, $annulees, $validees],
        ];

        return view('dashboard.index', compact('enCours', 'annulees', 'validees','dataForChart'));
    }
}
