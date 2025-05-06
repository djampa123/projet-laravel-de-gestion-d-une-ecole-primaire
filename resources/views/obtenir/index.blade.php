<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Notes des Élèves</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/minty/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            color: #333; /* Darker text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 95%;
            max-width: 1200px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        h2 {
            color: #28a745; /* Vibrant green title */
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
        .dropdown {
            margin-bottom: 25px;
        }
        .dropdown-toggle {
            background-color: #6c757d; /* Grey dropdown button */
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            transition: background-color 0.3s ease;
        }
        .dropdown-toggle:hover {
            background-color: #5a6268;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .dropdown-item {
            padding: 10px 15px;
            transition: background-color 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: #f0f0f0;
        }
        .add-button {
            margin-bottom: 25px;
            text-align: right;
        }
        .add-button a {
            background-color: #007bff; /* Blue add button */
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            transition: background-color 0.3s ease;
        }
        .add-button a:hover {
            background-color: #0056b3;
        }
        .table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0 12px;
        }
        .table thead th {
            background-color: #343a40; /* Dark grey header */
            color: white;
            border: none;
            padding: 15px 20px;
            text-align: left;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .table tbody tr {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }
        .table tbody td {
            padding: 15px 20px;
            border-bottom: none;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .badge-info {
            background-color: #17a2b8; /* Teal badge */
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: normal;
        }
        .actions {
            text-align: center;
        }
        .actions a, .actions form {
            display: inline-block;
            margin-right: 8px;
        }
        .actions a:last-child, .actions form:last-child {
            margin-right: 0;
        }
        .actions .btn {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: transform 0.2s ease;
        }
        .actions .btn:hover {
            transform: scale(1.05);
        }
        .btn-warning {
            background-color: #ffc107; /* Yellow edit button */
            border: none;
            color: #333;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545; /* Red delete button */
            border: none;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-bulletin {
            background-color: #00c851; /* Vert vif pour le bouton Bulletin */
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-bulletin:hover {
            background-color: #008b3d;
        }
        .text-center.actions .d-flex {
            justify-content: center !important;
        }
        .table thead th:first-child {
            border-top-left-radius: 10px;
        }
        .table thead th:last-child {
            border-top-right-radius: 10px;
        }
        .table tbody tr:first-child td:first-child {
            border-bottom-left-radius: 10px;
        }
        .table tbody tr:first-child td:last-child {
            border-bottom-right-radius: 10px;
        }
        .table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }
        .table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4"><i class="fas fa-list-alt fa-lg me-2"></i> Gestion des Notes des Élèves</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter me-2"></i> Filtrer par Classe
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('obtenir.index') }}"><i class="fas fa-list-ul me-2"></i> Toutes les classes</a></li>
                @foreach(\App\Models\Classe::all() as $classe)
                    <li><a class="dropdown-item" href="{{ route('obtenir.parClasse', $classe->id_classe) }}"><i class="fas fa-university me-2"></i> {{ $classe->nom_classe }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="add-button">
            <a href="{{ route('obtenir.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i> Ajouter une note</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th><i class="fas fa-user-graduate me-2"></i> Élève</th>
                    <th><i class="fas fa-chalkboard me-2"></i> Classe</th>
                    @php
                        $matieres = $notes->pluck('matiere.nom_matiere')->unique()->toArray();
                    @endphp
                    @foreach($matieres as $matiere)
                        <th class="text-center"><i class="fas fa-book me-2"></i> {{ $matiere }}</th>
                    @endforeach
                    <th class="text-center"><i class="fas fa-cogs me-2"></i> Actions</th>
                    <th class="text-center"><i class="fas fa-file-alt me-2"></i> Bulletin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes->groupBy('eleve.id_eleve') as $eleveId => $notesEleve)
                    <tr>
                        <td><div class="d-flex align-items-center"><i class="fas fa-user fa-fw me-2"></i> {{ $notesEleve->first()->eleve->nom_eleve }} {{ $notesEleve->first()->eleve->prenom_eleve }}</div></td>
                        <td><div class="d-flex align-items-center"><i class="fas fa-university fa-fw me-2"></i> {{ $notesEleve->first()->classe->nom_classe }}</div></td>
                        @foreach($matieres as $matiere)
                            @php
                                $noteMatiere = $notesEleve->firstWhere('matiere.nom_matiere', $matiere);
                            @endphp
                            <td class="text-center">
                                @if($noteMatiere)
                                    <span class="badge bg-info rounded-pill">{{ $noteMatiere->note }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        @endforeach
                        <td class="text-center actions">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('obtenir.edit', [
                                    'id_matiere' => $notesEleve->first()->id_matiere,
                                    'id_trimestre' => $notesEleve->first()->id_trimestre,
                                    'id_eleve' => $notesEleve->first()->id_eleve,
                                    'id_classe' => $notesEleve->first()->id_classe
                                ]) }}" class="btn btn-warning btn-sm me-2" title="Modifier"><i class="fas fa-edit fa-fw"></i></a>
                                <form action="{{ route('obtenir.destroy', [
                                    'id_matiere' => $notesEleve->first()->id_matiere,
                                    'id_trimestre' => $notesEleve->first()->id_trimestre,
                                    'id_eleve' => $notesEleve->first()->id_eleve,
                                    'id_classe' => $notesEleve->first()->id_classe
                                ]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer toutes les notes de cet élève ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"><i class="fas fa-trash-alt fa-fw"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('obtenir.bulletin', $notesEleve->first()->eleve->id_eleve) }}" class="btn btn-bulletin btn-sm" title="Voir le bulletin" target="_blank"><i class="fas fa-file-alt fa-fw"></i> Bulletin</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ 2 + count($matieres) + 2 }}" class="text-center"><i class="far fa-folder-open fa-lg me-2"></i> Aucune note enregistrée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>