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
        $preinscriptions = PreInscription::with('filiere')->get();
        return view('preinscriptions.index-etudiant',compact('preinscriptions'));
    }

    public function showFiliere($id){
        $preinscription =  PreInscription::findOrFail($id);
        return view('preinscriptions.show',compact('preinscription'));
    }

    public function showCandidatForm($id){
        $filiere = Filiere::findOrFail($id);
        $sousNiveaux = SousNiveau::where('niveau_id', $filiere->niveau_id)->get();
        return view('preinscriptions.show-candidat-form',compact('filiere','sousNiveaux'));
        
    }

    public function storeCandidate(Request $request){
        dd('ok');
        $documents= [];
        $documents_title= [];

        $demande = Demande::create([
            'filiere_id' => $request->filiere_id,
            'user_id'=> Auth::id(),
            'sous_niveau_id' => $request->sous_niveau_id,
            'documents' => json_encode($documents),
            'documents_title' => json_encode($documents_title),
            'statut' => null
        ]);

        return redirect()->route('preinscriptions.etudiant')->with('success', 'Votre demande a été enregistrer avec succés!!');
    }
}
