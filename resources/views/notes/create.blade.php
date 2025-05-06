<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Note</title>
</head>
<body>
    <h1>Ajouter une Note pour un Élève</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf

        <!-- Sélection de l'élève -->
        <label for="eleve">Élève</label>
        <select name="id_eleve" id="eleve" required>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id_eleve }}">{{ $eleve->nom_eleve }} {{ $eleve->prenom_eleve }}</option>
            @endforeach
        </select>
        <br>

        <!-- Sélection de la matière -->
        <label for="matiere">Matière</label>
        <select name="id_matiere" id="matiere" required>
            @foreach($matieres as $matiere)
                <option value="{{ $matiere->id_matiere }}">{{ $matiere->nom_matiere }}</option>
            @endforeach
        </select>
        <br>

        <!-- Sélection du trimestre -->
        <label for="trimestre">Trimestre</label>
        <select name="id_trimestre" id="trimestre" required>
            @foreach($trimestres as $trimestre)
                <option value="{{ $trimestre->id_trimestre }}">{{ $trimestre->nom_trimestre }}</option>
            @endforeach
        </select>
        <br>

        <!-- Sélection de la classe -->
        <label for="classe">Classe</label>
        <select name="id_classe" id="classe" required>
            @foreach($classes as $classe)
                <option value="{{ $classe->id_classe }}">{{ $classe->nom_classe }}</option>
            @endforeach
        </select>
        <br>

        <!-- Saisie de la note -->
        <label for="note">Note</label>
        <input type="number" name="note" id="note" step="0.01" required>
        <br>

        <!-- Date -->
        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>
        <br>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
