<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Eleve;




class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::with('eleve')->get();
        return view('paiements.index', compact('paiements'));
    }

    public function create()
    {
        $eleves = Eleve::all();
        return view('paiements.create', compact('eleves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tranche1' => 'required|numeric',
            'tranche2' => 'required|numeric',
            'tranche3' => 'required|numeric',
            'id_eleve' => 'required|exists:eleves,id_eleve',
        ]);

        Paiement::create($request->all());
        return redirect()->route('paiements.index')->with('success', 'Paiement enregistré.');
    }

    public function edit($id)
    {
        $paiement = Paiement::findOrFail($id);
        $eleves = Eleve::all();
        return view('paiements.edit', compact('paiement', 'eleves'));
    }

    public function update(Request $request, $id)
    {
        $paiement = Paiement::findOrFail($id);

        $request->validate([
            'tranche1' => 'required|numeric',
            'tranche2' => 'required|numeric',
            'tranche3' => 'required|numeric',
            'id_eleve' => 'required|exists:eleves,id_eleve',
        ]);

        $paiement->update($request->all());
        return redirect()->route('paiements.index')->with('success', 'Paiement mis à jour.');
    }

    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();
        return redirect()->route('paiements.index')->with('success', 'Paiement supprimé.');
    }
}


