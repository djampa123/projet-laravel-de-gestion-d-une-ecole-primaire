<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement d'une note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/minty/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fond clair et doux */
            color: #333; /* Texte plus foncé */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }
        h2 {
            color: #28a745; /* Vert vibrant pour le titre */
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 1.5px;
        }
        .alert-success {
            background-color: #e6ffe9;
            color: #155724;
            border-color: #c3e6cb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .form-label {
            font-weight: bold;
            color: #555; /* Label de champ plus discret */
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-select, .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-select:focus, .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff; /* Bleu primaire */
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .mb-3 {
            margin-bottom: 2rem !important; /* Espacement plus généreux entre les champs */
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4"><i class="fas fa-plus-circle fa-lg me-2"></i> Enregistrement d'une note</h2>

        @if(session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('obtenir.store') }}">
            @csrf

            <div class="mb-3">
                <label for="id_eleve" class="form-label"><i class="fas fa-user-graduate me-2"></i> Élève</label>
                <select name="id_eleve" class="form-select" required>
                    <option value="">-- Sélectionnez un élève --</option>
                    @foreach($eleves as $eleve)
                        <option value="{{ $eleve->id_eleve }}">{{ $eleve->nom_eleve }} {{ $eleve->prenom_eleve }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_matiere" class="form-label"><i class="fas fa-book me-2"></i> Matière</label>
                <select name="id_matiere" class="form-select" required>
                    <option value="">-- Sélectionnez une matière --</option>
                    @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id_matiere }}">{{ $matiere->nom_matiere }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_trimestre" class="form-label"><i class="far fa-calendar-alt me-2"></i> Trimestre</label>
                <select name="id_trimestre" class="form-select" required>
                    <option value="">-- Sélectionnez un trimestre --</option>
                    @foreach($trimestres as $trimestre)
                        <option value="{{ $trimestre->id_trimestre }}">{{ $trimestre->nom_trimestre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_classe" class="form-label"><i class="fas fa-chalkboard me-2"></i> Classe</label>
                <select name="id_classe" class="form-select" required>
                    <option value="">-- Sélectionnez une classe --</option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id_classe }}">{{ $classe->nom_classe }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label"><i class="fas fa-sort-numeric-up me-2"></i> Note</label>
                <input type="number" name="note" class="form-control" step="0.01" placeholder="Ex: 15.5" required>
                <small class="form-text text-muted">Veuillez entrer la note sur 20 (ou selon l'échelle utilisée).</small>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label"><i class="far fa-calendar me-2"></i> Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Enregistrer la note</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>