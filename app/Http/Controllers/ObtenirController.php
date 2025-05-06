<?php

namespace App\Http\Controllers;

use App\Models\Obtenir;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Trimestre;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Barryvdh\DomPDF\Facade\Pdf;

class ObtenirController extends Controller
{
    public function index()
    {
        $notes = Obtenir::with(['eleve', 'classe', 'matiere', 'trimestre'])->get();
        return view('obtenir.index', compact('notes'));
    }
    public function afficherParClasse(Classe $classe)
{
    $notes = Obtenir::where('id_classe', $classe->id_classe)
        ->with(['eleve', 'classe', 'matiere', 'trimestre'])
        ->get();

    return view('obtenir.index', compact('notes'));
}

    public function create()
    {
        return view('obtenir.create', [
            'eleves' => Eleve::all(),
            'classes' => Classe::all(),
            'matieres' => Matiere::all(),
            'trimestres' => Trimestre::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_matiere' => 'required',
            'id_trimestre' => 'required',
            'id_eleve' => 'required',
            'id_classe' => 'required',
            'note' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Obtenir::create($request->all());

        return redirect()->route('obtenir.index')->with('success', 'Note ajoutée avec succès.');
    }

    public function edit($id_matiere, $id_trimestre, $id_eleve, $id_classe)
    {
        $note = Obtenir::where([
            'id_matiere' => $id_matiere,
            'id_trimestre' => $id_trimestre,
            'id_eleve' => $id_eleve,
            'id_classe' => $id_classe,
        ])->firstOrFail();

        return view('obtenir.edit', [
            'note' => $note,
            'eleves' => Eleve::all(),
            'classes' => Classe::all(),
            'matieres' => Matiere::all(),
            'trimestres' => Trimestre::all()
        ]);
    }
    public function afficherBulletin(Eleve $eleve)
    {
        // Récupérer toutes les notes de l'élève avec les matières et trimestres associés
        $notes = Obtenir::where('id_eleve', $eleve->id_eleve)
            ->join('matieres', 'obtenir.id_matiere', '=', 'matieres.id_matiere') // Ajouter cette ligne pour la jointure
            ->with(['matiere', 'trimestre'])
            ->orderBy('matieres.nom_matiere') // Modifier la référence de la colonne pour le tri
            ->get();

        // Récupérer la salle actuelle de l'élève
        $salleActuelle = $eleve->salle;

        // Calculer la moyenne générale
        $totalNotes = $notes->sum('note');
        $nombreNotes = $notes->count();
        $moyenneGenerale = $nombreNotes > 0 ? $totalNotes / $nombreNotes : 0;

        // Déterminer la mention
        $mention = '';
        if ($moyenneGenerale >= 16) {
            $mention = 'Très Bien';
        } elseif ($moyenneGenerale >= 14) {
            $mention = 'Bien';
        } elseif ($moyenneGenerale >= 12) {
            $mention = 'Assez Bien';
        } elseif ($moyenneGenerale >= 10) {
            $mention = 'Passable'; // Ou 'Admis' selon votre préférence
        } else {
            $mention = 'Échec';
        }

        // Récupérer les informations de l'élève
        $nomEleve = $eleve->nom_eleve;
        $prenomEleve = $eleve->prenom_eleve;
        $dateNaissance = $eleve->date_naiss;
        $lieuNaissance = $eleve->lieu_naiss;
        $nomParent = $eleve->nom_parent;
        $telephoneParent = $eleve->telephone_parent;
        $classe = $notes->first()->classe ?? null; // Récupérer la classe

        $bulletinData = compact('eleve', 'notes', 'salleActuelle', 'moyenneGenerale', 'nomEleve', 'prenomEleve', 'dateNaissance', 'lieuNaissance', 'nomParent', 'telephoneParent', 'classe', 'mention'); // Ajouter 'mention' au compact

        $pdf = Pdf::loadView('bulletin.index', $bulletinData);

        return $pdf->download('bulletin_eleve_' . $nomEleve . '_' . $prenomEleve . '.pdf');
    }



public function update(Request $request, $id_matiere, $id_trimestre, $id_eleve, $id_classe)
{
$request->validate([
'note' => 'required|numeric',
'date' => 'required|date',
]);

Obtenir::where([
'id_matiere' => $id_matiere,
'id_trimestre' => $id_trimestre,
'id_eleve' => $id_eleve,
'id_classe' => $id_classe,
])->update($request->only(['note', 'date'])); // Utilisation de update() sur la requête

return redirect()->route('obtenir.index')->with('success', 'Note modifiée avec succès.');
}

 public function destroy($id_matiere, $id_trimestre, $id_eleve, $id_classe)
{
    Obtenir::where([
        'id_matiere' => $id_matiere,
        'id_trimestre' => $id_trimestre,
        'id_eleve' => $id_eleve,
        'id_classe' => $id_classe,
    ])->delete();

    return redirect()->route('obtenir.index')->with('success', 'Note supprimée avec succès.');
}
}

