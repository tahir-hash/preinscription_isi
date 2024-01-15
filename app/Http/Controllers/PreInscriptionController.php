<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\PreInscription;
use App\Models\User;
use Illuminate\Http\Request;

class PreInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preinscriptions = PreInscription::all();
        $filieres = Filiere::all();
        return view('preinscriptions.index', compact('preinscriptions', 'filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filiere_id' => 'required|exists:filieres,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ], [
            'date_debut.after_or_equal' => 'La date de début doit être supérieure ou égale à la date d\'aujourd\'hui.',
            'date_fin.after' => 'La date de fin doit être strictement supérieure à la date de début.',
        ]);

        $filiere_verify = Preinscription::where('filiere_id', $request->filiere_id)->where('statut', true)->get();
        if ($filiere_verify->count() != 0) {
            return redirect()->route('preinscriptions.index')->with('danger', 'Cette filiere existe deja!!');
        }

        $preinscription = new Preinscription;
        $preinscription->filiere_id = $request->filiere_id;
        $preinscription->date_debut = $request->date_debut;
        $preinscription->date_fin = $request->date_fin;
        $preinscription->statut = true;
        $preinscription->save();

        return redirect()->route('preinscriptions.index')->with('success', 'Preinscription ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $preinscription = PreInscription::findOrFail($id);

        $validatedData = $request->validate([
            'filiere_id' => 'required|exists:filieres,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ], [
            'date_debut.after_or_equal' => 'La date de début doit être supérieure ou égale à la date d\'aujourd\'hui.',
            'date_fin.after' => 'La date de fin doit être strictement supérieure à la date de début.',
        ]);

        if ($preinscription->filiere_id != $request->filiere_id) {
            $filiere_verify = Preinscription::where('filiere_id', $request->filiere_id)->where('statut', true)->get();
            if ($filiere_verify->count() != 0) {
                return redirect()->route('preinscriptions.index')->with('danger', 'Cette filiere existe deja!!');
            }
        }
        $preinscription->update($validatedData);

        return redirect()->route('preinscriptions.index')->with('success', 'Preinscription  mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $preinscription = PreInscription::find($id);
        $preinscription->delete();
        return redirect()->route('preinscriptions.index');
    }
}
