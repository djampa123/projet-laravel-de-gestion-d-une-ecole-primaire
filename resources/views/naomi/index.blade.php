@extends('layout')

@section('content')
<style>
        body {
            background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            border-radius: 1rem;
            animation: gradientBG 12s ease infinite;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .card {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">📚 Liste des Étudiants</h2>
            <p class="text-muted">Gérez les informations des élèves facilement</p>
        </div>

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Lieu</th>
                                <th>Image</th>
                                <th>Section</th>
                                <th>Classe</th>
                                <th>Salle</th>
                                <th>Parent</th>
                                <th>Tel Parent</th>
                                <th>👁️</th>
                                <th>✏️</th>
                                <th>🗑️</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($students as $student)
                                <tr class="align-middle">
                                    <td>{{ $student->nom }}</td>
                                    <td>{{ $student->prenom }}</td>
                                    <td>{{ $student->date_naissance }}</td>
                                    <td>{{ $student->lieu_naissance }}</td>
                                    <td>
                                        @if($student->image && file_exists(storage_path('app/public/images/' . $student->image)))
                                            <img src="{{ asset('storage/images/' . $student->image) }}" alt="Photo de {{ $student->nom }}" class="rounded-circle shadow" width="60" height="60">
                                        @else
                                            <span class="text-muted">Aucune image</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->section }}</td>
                                    <td>{{ $student->classe->nom_classe ?? '—' }}</td>
                                    <td>{{ $student->salle->nom_salle ?? '—' }}</td>
                                    <td>{{ $student->nom_parent }}</td>
                                    <td>{{ $student->tel_parent }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id_eleve) }}" class="btn btn-outline-info btn-sm">
                                            <i class="bi bi-eye-fill"> voir</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('students.edit', $student->id_eleve) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-pencil-fill">modifier</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('students.destroy', $student->id_eleve) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash-fill">supprimer</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($students->isEmpty())
                    <div class="text-center text-muted py-3">Aucun étudiant trouvé.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
