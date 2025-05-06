@extends('layout')

@section('content')
<style>
    .animated-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        animation: fadeInUp 0.4s ease-in-out;
    }

    .btn-primary {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        border: none;
        font-weight: bold;
        box-shadow: 0 0 8px #0072ff50;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 0 12px #0072ff80;
    }

    .table th {
        background: #f1f4f9;
        color: #34495e;
        font-weight: bold;
    }

    .table tbody tr:hover {
        background-color: #f9fbff;
        transition: background 0.2s ease;
    }

    .btn-warning {
        background-color: #f39c12;
        border: none;
        font-weight: bold;
    }

    .btn-danger {
        background-color: #e74c3c;
        border: none;
        font-weight: bold;
    }

    .alert-success {
        animation: popFade 0.5s ease;
    }

    @keyframes popFade {
        0% { transform: scale(0.9); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
</style>

<div class="container py-5">
    <h1 class="text-center">🚨 Liste des Avertissements</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-end">
        <a href="{{ route('avertissements.create') }}" class="btn btn-primary">+ Ajouter un avertissement</a>
    </div>

    <div class="animated-card table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Élève</th>
                    <th>Prénom Élève</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($avertissements as $avertissement)
                    <tr>
                        <td>{{ $avertissement->id }}</td>
                        <td>{{ $avertissement->eleve->nom_eleve ?? 'Non trouvé' }}</td>
                        <td>{{ $avertissement->eleve->prenom_eleve ?? 'Non trouvé' }}</td>
                        <td>{{ $avertissement->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($avertissement->date_avertissement)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('avertissements.edit', $avertissement) }}" class="btn btn-sm btn-warning me-1">✏️ modifier</a>   </td>
                            <td>
                            <form action="{{ route('avertissements.destroy', $avertissement) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ supprimer </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucun avertissement trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
