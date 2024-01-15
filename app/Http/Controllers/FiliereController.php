<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Filiere;
use App\Models\Niveau;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::orderBy('id', 'DESC')->paginate(5);
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Department::all();
        $niveaux = Niveau::all();
        return view('filieres.create', compact('departements', 'niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'description' => 'required|string',
        ]);
        // Création de la filière
        $filiere = Filiere::create($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès');
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
        $departements = Department::all();
        $niveaux = Niveau::all();
        $filiere = Filiere::findOrFail($id);
        return view('filieres.edit', compact('filiere', 'departements', 'niveaux'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'description' => 'required|string',
        ]);

        // Mise à jour de la filière
        $filiere = Filiere::findOrFail($id);
        $filiere->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filiere = Filiere::find($id);
        $filiere->delete();
        return redirect()->route('filieres.index');
    }
}
