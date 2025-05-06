<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use App\Models\Classe;

class EnseignantController extends Controller
{
    // Affichage de la liste des enseignants
    public function index()
    {
        $enseignants = Enseignant::with('classe')->get();
        return view('enseignants/index', compact('enseignants'));
    }

    // Formulaire d'ajout d'un enseignant
    public function create()
    {
        $classes = Classe::all();
        return view('enseignants/create', compact('classes'));
    }
    
    
    // Enregistrement d'un enseignant
    // store
// Dans le contrôleur EnseignantController

public function store(Request $request)
{
    $request->validate([
        'nom_enseignant' => 'required|string|max:255',
        'classe_id' => 'required|exists:classes,id_classe', // 👈 ici aussi
    ]);
    

    Enseignant::create([
        'nom_enseignant' => $request->nom_enseignant,
        'classe_id' => $request->classe_id,
    ]);

    return redirect()->route('enseignants.index')->with('success', 'Enseignant ajouté avec succès');

}





    // Formulaire de modification d'un enseignant
    public function edit($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $classes = Classe::all();
        return view('enseignants.edit', compact('enseignant', 'classes'));
    }

    // Mise à jour des informations d'un enseignant
    // update
public function update(Request $request, Enseignant $enseignant)
{
    $request->validate([
        'nom_enseignant' => 'required|string|max:255',
        'classe_id' => 'required|exists:classes,id',
    ]);

    $enseignant->update($request->only('nom_enseignant', 'classe_id'));

    return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès');
}


    // Suppression d'un enseignant
   // Suppression d'un enseignant
public function destroy($id)
{
    $enseignant = Enseignant::findOrFail($id);

    // Suppression de l'enseignant
    $enseignant->delete();

    return redirect()->route('enseignants.index')->with('success', 'Enseignant supprimé avec succès');
}

}