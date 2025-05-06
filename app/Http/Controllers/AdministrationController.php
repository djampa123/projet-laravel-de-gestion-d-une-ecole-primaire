<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;

class AdministrationController extends Controller
{
    public function index()
    {
        {
            $administration = Administration::whereNotIn('profession', ['Nettoyeur', 'Jardinier', 'Agent de sécurité'])->get();
            return view('administrations.index', compact('administration'));
        }
    }

    public function create()
    {
        return view('administrations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_personnel' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
        ]);

        Administration::create($request->all());

        return redirect()->route('administrations.index')->with('success', 'Personnel ajouté');
    }



    public function edit($id)
    {
        $administration = Administration::findOrFail($id);
        return view('administrations.edit', compact('administration'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_personnel' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
        ]);

        $personnel = Administration::findOrFail($id);
        $personnel->update($request->all());

        return redirect()->route('administrations.index')->with('success', 'Mise à jour réussie');
    }

    public function destroy($id)
    {
        $personnel = Administration::findOrFail($id);
        $personnel->delete();

        return redirect()->route('administrations.index')->with('success', 'Personnel supprimé');
    }
}
