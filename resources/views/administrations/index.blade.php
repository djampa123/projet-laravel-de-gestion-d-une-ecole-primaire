@extends('app')

@section('title', 'Liste du Personnel Administratif')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .table thead {
        background-color: #f8f9fa;
        font-weight: bold;
        text-transform: uppercase;
        color: #34495e;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
        transition: 0.3s;
    }

    .btn-custom {
        padding: 8px 16px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container fade-in">
    <h2 class="my-4 text-center text-primary">📋 Personnel Administratif</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('administrations.create') }}" class="btn btn-success btn-custom">
            ➕ Ajouter un Personnel
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered shadow-sm rounded">
            <thead>
                <tr>
                    <th>👤 Nom</th>
                    <th>💼 Profession</th>
                    <th>⚙️ Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($administration as $personnel)
                    <tr>
                        <td>{{ $personnel->nom_personnel }}</td>
                        <td>{{ $personnel->profession }}</td>
                        <td>
                            <a href="{{ route('administrations.edit', $personnel->id_administration) }}" class="btn btn-warning btn-sm btn-custom">✏️ Modifier</a>
                            <form action="{{ route('administrations.destroy', $personnel->id_administration) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-custom">🗑️ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucun personnel trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
