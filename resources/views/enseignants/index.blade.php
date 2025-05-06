@extends('app')

@section('title', 'Liste des Enseignants')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .badge-success {
        background-color: #28a745;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
    }

    .badge-danger {
        background-color: #dc3545;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
    }

    .btn-action {
        margin-right: 5px;
        font-weight: bold;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
</style>

<div class="container fade-in mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="mb-4 text-center text-primary">👩‍🏫 Liste des Enseignants et leurs Classes</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="text-end mb-3">
                <a href="{{ route('enseignants.create') }}" class="btn btn-success">
                    ➕ Ajouter un Enseignant
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover border rounded">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>👨‍🏫 Enseignant</th>
                            <th>📘 Classe Assignée</th>
                            <th>⚙️ Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enseignants as $enseignant)
                            <tr>
                                <td>{{ $enseignant->id }}</td>
                                <td>{{ $enseignant->nom_enseignant }}</td>
                                <td>
                                    @if($enseignant->classe)
                                        <span class="badge badge-success">{{ $enseignant->classe->nom_classe }}</span>
                                    @else
                                        <span class="badge badge-danger">Non assignée</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('enseignants.edit', $enseignant->id) }}" class="btn btn-warning btn-sm btn-action">✏️ Modifier</a>
                                    <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet enseignant ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">🗑️ Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Aucun enseignant trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
