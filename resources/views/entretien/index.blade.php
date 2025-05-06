@extends('app')

@section('title', 'Liste des agents')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .header-title {
        font-size: 26px;
        font-weight: 700;
        color: #198754;
    }

    .table thead th {
        background-color: #f1f1f1;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>

<div class="container mt-5 fade-in">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="header-title">🧹 Liste du Personnel d'Entretien</h2>
        <a href="{{ route('entretien.create') }}" class="btn btn-success">➕ Ajouter un agent</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>👤 Nom</th>
                    <th>🛠️ Profession</th>
                    <th>⚙️ Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($entretiens as $entretien)
                    <tr>
                        <td>{{ $entretien->nom_personnel }}</td>
                        <td>{{ $entretien->profession }}</td>
                        <td>
                            <a href="{{ route('entretien.edit', $entretien->id_administration) }}" class="btn btn-sm btn-warning">✏️ Modifier</a>

                            <form action="{{ route('entretien.destroy', $entretien->id_administration) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet agent ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucun agent trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
