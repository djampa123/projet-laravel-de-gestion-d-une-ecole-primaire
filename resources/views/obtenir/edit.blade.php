<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/quartz/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background */
            color: #333; /* Dark grey text for better readability */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-y: auto;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff; /* White container for contrast */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            color: #1e88e5;
            margin-bottom: 35px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 1.5px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            background-color: #f8f9fa; /* Light grey input background for contrast */
            color: #333;
        }
        .form-control:focus {
            border-color: #1e88e5;
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.25);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #1e7e34;
            border-color: #1c7430;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #4e555b;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .mb-3 {
            margin-bottom: 25px;
        }
        .actions {
            margin-top: 35px;
            text-align: center;
        }
        .form-text {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }
        select.form-control:disabled,
        input.form-control:disabled {
            background-color: #e9ecef;
            opacity: 0.8;
            color: #333;
        }
        input[type="text"]:disabled {
            background-color: #e9ecef;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4"><i class="fas fa-pen-fancy"></i> Modifier la Note</h2>

    @if ($errors->any())
        <div class="alert alert-danger rounded-pill shadow-sm">
            <i class="fas fa-exclamation-triangle"></i> Veuillez corriger les erreurs suivantes :
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obtenir.update', [$note->id_matiere, $note->id_trimestre, $note->id_eleve, $note->id_classe]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_matiere" class="form-label"><i class="fas fa-book-open"></i> Matière</label>
            <input type="text" class="form-control" value="{{ $note->matiere->nom_matiere }}" disabled readonly>
            <input type="hidden" name="id_matiere" value="{{ $note->id_matiere }}">
            <small class="form-text text-muted">La matière ne peut pas être modifiée.</small>
        </div>

        <div class="mb-3">
            <label for="id_trimestre" class="form-label"><i class="far fa-calendar-check"></i> Trimestre</label>
            <input type="text" class="form-control" value="{{ $note->trimestre->nom_trimestre }}" disabled readonly>
            <input type="hidden" name="id_trimestre" value="{{ $note->id_trimestre }}">
            <small class="form-text text-muted">Le trimestre ne peut pas être modifié.</small>
        </div>

        <div class="mb-3">
            <label for="id_eleve" class="form-label"><i class="fas fa-user-graduate"></i> Élève</label>
            <input type="text" class="form-control" value="{{ $note->eleve->nom_eleve }} {{ $note->eleve->prenom_eleve }}" disabled readonly>
            <input type="hidden" name="id_eleve" value="{{ $note->id_eleve }}">
            <small class="form-text text-muted">L'élève ne peut pas être modifié.</small>
        </div>

        <div class="mb-3">
            <label for="id_classe" class="form-label"><i class="fas fa-school"></i> Classe</label>
            <input type="text" class="form-control" value="{{ $note->classe->nom_classe }}" disabled readonly>
            <input type="hidden" name="id_classe" value="{{ $note->id_classe }}">
            <small class="form-text text-muted">La classe ne peut pas être modifiée.</small>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label"><i class="fas fa-sort-numeric-up"></i> Note</label>
            <input type="number" class="form-control" id="note" name="note" value="{{ $note->note }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label"><i class="far fa-calendar"></i> Date</label>
            <input type="date" class="form-control flatpickr-input" id="date" name="date" value="{{ $note->date }}" required>
            <small class="form-text text-muted">Sélectionnez la date de la note.</small>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Enregistrer les modifications</button>
            <a href="{{ route('obtenir.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#date", {
        dateFormat: "Y-m-d",
    });
</script>
</body>
</html>