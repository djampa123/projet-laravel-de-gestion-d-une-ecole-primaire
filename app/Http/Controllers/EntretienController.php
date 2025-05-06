<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;

class EntretienController extends Controller
{
    public function index()
    {
        // Récupère tout le personnel d’entretien
        $entretiens = Administration::whereIn('profession', ['Nettoyeur', 'Jardinier', 'Agent de sécurité'])->get();

        return view('entretien.index', compact('entretiens'));
    }

    public function create()
    {
        return view('entretien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_personnel' => 'required|string|max:255',
            'profession' => 'required|string|max:150',
        ]);

        Administration::create($request->all());

        return redirect()->route('entretien.index')->with('success', 'Agent ajouté avec succès.');
    }

    public function edit($id)
    {
        $entretien = Administration::findOrFail($id);

        return view('entretien.edit', compact('entretien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_personnel' => 'required|string|max:255',
            'profession' => 'required|string|max:150',
        ]);

        $entretien = Administration::findOrFail($id);
        $entretien->update($request->all());

        return redirect()->route('entretien.index')->with('success', 'Agent mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $entretien = Administration::findOrFail($id);
        $entretien->delete();

        return redirect()->route('entretien.index')->with('success', 'Agent supprimé avec succès.');
    }
}
