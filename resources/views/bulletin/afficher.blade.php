<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bulletin Scolaire</title>
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        .container { width: 80%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .student-info { margin-bottom: 15px; }
        .grades-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .grades-table th, .grades-table td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .grades-table th { background-color: #f0f0f0; }
        .general-results { margin-bottom: 15px; font-weight: bold; }
        .comments { margin-bottom: 15px; }
        .signatures { display: flex; justify-content: space-around; }
        .signature-line { border-top: 1px solid #000; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nom de l'Établissement</h1>
            <p>Adresse de l'Établissement</p>
            <h2>Bulletin Scolaire</h2>
            <p>Année Scolaire: {{ $trimestreInfo->annee_scolaire }} - Trimestre: {{ $trimestreInfo->nom_trimestre }}</p>
        </div>

        <div class="student-info">
            <p><strong>Nom:</strong> {{ $eleve->nom_eleve }}</p>
            <p><strong>Prénom:</strong> {{ $eleve->prenom_eleve }}</p>
            <p><strong>Classe:</strong> {{ $classeInfo->nom_classe }}</p>
            <p><strong>Date de Naissance:</strong> {{ $eleve->date_naissance }}</p>
            </div>

        <h3>Résultats par Matière</h3>
        <table class="grades-table">
            <thead>
                <tr>
                    <th>Matière</th>
                    <th>Moyenne</th>
                    <th>Appréciation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes->groupBy('matiere.nom_matiere') as $matiereNom => $notesMatiere)
                    <tr>
                        <td>{{ $matiereNom }}</td>
                        <td>{{ number_format($notesMatiere->avg('note'), 2) }}</td>
                        <td>
                            @if(isset($appreciations) && $appreciation = $appreciations->firstWhere('matiere.nom_matiere', $matiereNom))
                                {{ $appreciation->appreciation_professeur }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="general-results">
            <p><strong>Moyenne Générale:</strong> {{ number_format($moyenneGenerale, 2) }}</p>
            </div>

        @if(isset($absences) && $absences->isNotEmpty())
            <div class="attendance">
                <h3>Assiduité</h3>
                <p><strong>Total Absences Justifiées:</strong> {{ $absences->where('motif', 'justifiée')->count() }}</p>
                <p><strong>Total Absences Non Justifiées:</strong> {{ $absences->where('motif', 'non justifiée')->count() }}</p>
            </div>
        @endif

        <div class="comments">
            <h3>Appréciation Générale</h3>
            <p>[Espace pour l'appréciation générale du conseil de classe]</p>
        </div>

        <div class="signatures">
            <div style="text-align: center;">
                <div class="signature-line">&nbsp;</div>
                <p>Professeur Principal</p>
            </div>
            <div style="text-align: center;">
                <div class="signature-line">&nbsp;</div>
                <p>Direction</p>
            </div>
            <div style="text-align: center;">
                <div class="signature-line">&nbsp;</div>
                <p>Parents/Tuteurs</p>
            </div>
        </div>
    </div>
</body>
</html>