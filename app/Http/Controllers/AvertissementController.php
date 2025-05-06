<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avertissement;
use App\Models\Eleve;

class AvertissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avertissements = Avertissement::with('eleve')->get();
       // dd($avertissements);
        return view('avertissements/index', compact('avertissements'));
    }

    public function edit($id)
    {
        $avertissement = Avertissement::findOrFail($id);
        $eleves = Eleve::all();
        return view('avertissements/edit', compact('avertissement', 'eleves'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'date_avertissement' => 'required|date',
            'id_eleve' => 'required|exists:eleves,id_eleve',
        ]);
    
        $avertissement = Avertissement::findOrFail($id);
        $avertissement->update($request->all());
    
        return redirect()->route('avertissements.index')->with('success', 'Avertissement mis à jour');
    }
    

    public function create()
    {
        $eleves = Eleve::all();
        return view('avertissements.create', compact('eleves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'date_avertissement' => 'required|date',
            'id_eleve' => 'required|exists:eleves,id_eleve',
        ]);

        Avertissement::create($request->all());

        return redirect()->route('avertissements.index')->with('success', 'Avertissement ajouté');
    }

    public function destroy($id)
    {
        Avertissement::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Supprimé avec succès');
    }
}