<?php
namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Matieres;
use App\Models\Trimestre;
use App\Models\Classe;
use Illuminate\Http\Request;
use DB;

class NoteController extends Controller
{
    public function create()
    {
        // Récupère tous les élèves, matières, trimestres et classes pour les afficher dans le formulaire
        $eleves = Eleve::all();
        $matieres = Matieres::all();
        $trimestres = Trimestre::all();
        $classes = Classe::all();

        // Retourne la vue avec les données nécessaires
        return view('notes.create', compact('eleves', 'matieres', 'trimestres', 'classes'));
    }

    public function store(Request $request)
    {
        // Validation des données envoyées
        $validated = $request->validate([
            'id_eleve' => 'required|integer',
            'id_matiere' => 'required|integer',
            'id_trimestre' => 'required|integer',
            'id_classe' => 'required|integer',
            'note' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Insertion dans la table 'Obtenir' pour enregistrer la note
        DB::table('Obtenir')->insert([
            'id_matiere' => $request->id_matiere,
            'id_trimestre' => $request->id_trimestre,
            'id_eleve' => $request->id_eleve,
            'id_classe' => $request->id_classe,
            'note' => $request->note,
            'date' => $request->date,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('notes.create')->with('success', 'La note a été ajoutée avec succès');
    }
}
