<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    // Affiche le formulaire pour ajouter une matière à une classe
    public function create()
    {
        $classes = Classe::all();
        $sections = \App\Models\section::all(); 
        return view('create', compact('classes', 'sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_matiere' => 'required|string|max:50',
            'id_classe' => 'required|exists:classes,id_classe',
            'id_section' => 'required|exists:sections,id',
        ]);

        $matiere = Matiere::create(['nom_matiere' => $validated['nom_matiere']]);
        $matiere->classes()->attach($validated['id_classe']);

        // Mettre à jour la classe avec la section
        $classe = Classe::find($validated['id_classe']);
        $classe->id_section = $validated['id_section'];
        $classe->save();

        return redirect()->route('matieres.create')->with('success', 'Matière ajoutée avec succès!');
    }
    public function index()
    {
        $matieres = Matiere::with('classes.section')->get();
      
        return view('list', compact('matieres'));
    }
    public function edit($id_matiere)
    {
        $matiere = Matiere::find($id_matiere);
        $classes = Classe::all();
        $sections = \App\Models\section::all(); 
        return view('modify', compact('matiere', 'classes', 'sections'));
    }

    public function update(Request $request, $id_matiere)
    {
        $validated = $request->validate([
            'nom_matiere' => 'required|string|max:50',
            'classes' => 'required|array',
            'id_section' => 'required|exists:sections,id',
        ]);

        $matiere = Matiere::find($id_matiere);
        $matiere->nom_matiere = $validated['nom_matiere'];
        $matiere->classes()->sync($validated['classes']);
        $matiere->save();

        // Mettre à jour la classe avec la section
        $classe = $matiere->classes()->first(); // Récupérer la première classe associée
        $classe->id_section = $validated['id_section'];
        $classe->save();

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour avec succès!');
    }
    public function destroy(Matiere $matiere)
{
    $matiere->delete();
    return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès!');
}

}
