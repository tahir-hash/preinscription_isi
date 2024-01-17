<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\PreInscription;
use App\Models\SousNiveau;
use Illuminate\Support\Facades\Auth;

class PreInscriptionEtudiantController extends Controller
{
    public function indexEtudiant()
    {
        $preinscriptions = PreInscription::with('filiere')->where('statut',true)->get();
        return view('preinscriptions.index-etudiant', compact('preinscriptions'));
    }

    public function showFiliere($id)
    {
        $preinscription =  PreInscription::findOrFail($id);
        return view('preinscriptions.show', compact('preinscription'));
    }

    public function showCandidatForm($id)
    {
        $filiere = Filiere::findOrFail($id);
        $sousNiveaux = SousNiveau::where('niveau_id', $filiere->niveau_id)->get();
        return view('preinscriptions.show-candidat-form', compact('filiere', 'sousNiveaux'));
    }

    public function storeCandidate(Request $request)
    {
        $validatedData = $request->validate([
            'sous_niveau_id' => 'required|exists:sous_niveaux,id',
            'cni' => 'required|mimes:pdf',
            'domicile' => 'required|mimes:pdf',
        ]);


        $documents = [];
        $documents_title = [];
        $cni = $request->file('cni');
        $domicile = $request->file('domicile');

        // Convertit le premier fichier en type blob
        $blob = base64_encode(file_get_contents($cni->getRealPath()));

        // Convertit le deuxième fichier en type blob
        $blob1 = base64_encode(file_get_contents($domicile->getRealPath()));

        $documents = [$blob, $blob1];
        $documents_title = [$cni->getClientOriginalName(), $domicile->getClientOriginalName()];

        //dd(json_encode($documents));
        $demande = Demande::create([
            'filiere_id' => $request->filiere_id,
            'user_id' => Auth::id(),
            'sous_niveau_id' => $request->sous_niveau_id,
            'documents' => json_encode($documents),
            'documents_title' => json_encode($documents_title),
            'statut' => null
        ]);

        return redirect()->route('preinscriptions.etudiant')->with('success', 'Votre demande a été enregistrer avec succés!!');
    }
}
