<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::with(['user', 'filiere', 'sousNiveau'])->where('statut', null)->get();
        return view('demandes.index', compact('demandes'));
    }
    public function indexValide()
    {
        $demandes = Demande::with(['user', 'filiere', 'sousNiveau'])->where('statut', true)->get();
        return view('demandes.index-valide', compact('demandes'));
    }

    public function indexInvalide()
    {
        $demandes = Demande::with(['user', 'filiere', 'sousNiveau'])->where('statut', false)->get();
        return view('demandes.index-invalide', compact('demandes'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function validation($id, $type)
    {
        $demande = Demande::find($id);
        $message = '';
        if ($type == 'valide') {
            $demande->statut = true;
            $message = 'Demande validée avec succés!!';
        } else {
            $demande->statut = false;
            $message = 'Demande invalidée avec succés!!';
        }

        $demande->save();

        return redirect()->route('demandes.index')->with('success', $message);
    }


    public function download($id)
    {
        $this->downloadFilesZip($id);
    }
}
