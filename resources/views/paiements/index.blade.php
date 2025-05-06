@extends('app')

@section('content')
<style>
    body {
        background-color: #f0f2f5;
    }

    .card-table {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        animation: fadeSlide 0.8s ease;
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table thead th {
        background: linear-gradient(to right, #4facfe, #00f2fe);
        color: white;
        font-weight: bold;
        border: none;
    }

    .table tbody tr:hover {
        background-color: #eaf6ff;
        transition: 0.3s;
    }

    .table td, .table th {
        vertical-align: middle;
        padding: 15px;
    }

    .badge-total {
        font-size: 1rem;
        background: #20c997;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
    }

    .btn-action {
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<div class="container-fluid py-5">
    <div class="card-table">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">📋 Liste complète des paiements</h2>
            <a href="{{ route('paiements.create') }}" class="btn btn-primary btn-action">
                <i class="bi bi-plus-circle me-1"></i> Ajouter un paiement
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l'élève</th>
                        <th>Tranche 1 (FCFA)</th>
                        <th>Tranche 2 (FCFA)</th>
                        <th>Tranche 3 (FCFA)</th>
                        <th>Total payé</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paiements as $paiement)
                        <tr>
                            <td>{{ $paiement->id_paiement }}</td>
                            <td>{{ $paiement->eleve->nom_eleve ?? 'Inconnu' }}</td>
                            <td>{{ number_format($paiement->tranche1, 0, ',', ' ') }}</td>
                            <td>{{ number_format($paiement->tranche2, 0, ',', ' ') }}</td>
                            <td>{{ number_format($paiement->tranche3, 0, ',', ' ') }}</td>
                            <td>
                                <span class="badge badge-total">
                                    {{ number_format($paiement->tranche1 + $paiement->tranche2 + $paiement->tranche3, 0, ',', ' ') }} FCFA
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('paiements.edit', $paiement->id_paiement) }}" class="btn btn-warning btn-sm btn-action">
                                    <i class="bi bi-pencil-square"></i> Modifier
                                </a>
                                <form action="{{ route('paiements.destroy', $paiement->id_paiement) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">Aucun paiement trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
