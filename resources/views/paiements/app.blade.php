@extends('app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #f6f9fc, #eef5ff);
    }

    .card-glow {
        background: white;
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
        padding: 30px;
        animation: slideFadeIn 1s ease;
    }

    @keyframes slideFadeIn {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .btn-glow {
        transition: 0.3s ease;
        border-radius: 30px;
    }

    .btn-glow:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
    }

    .table thead {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
        color: white;
        border-radius: 12px;
    }

    .table tbody tr {
        transition: background 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f0f8ff;
    }

    .icon-btn {
        transition: 0.2s;
    }

    .icon-btn:hover {
        transform: scale(1.2);
    }
</style>

<div class="container py-5">
    <div class="card-glow">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">💼 Gestion des Paiements</h2>
            <a href="{{ route('paiements.create') }}" class="btn btn-primary btn-glow">
                <i class="bi bi-plus-circle me-1"></i> Nouveau paiement
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="rounded-top">
                    <tr>
                        <th>ID</th>
                        <th>Élève</th>
                        <th>Tranche 1</th>
                        <th>Tranche 2</th>
                        <th>Tranche 3</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paiements as $paiement)
                        <tr>
                            <td>{{ $paiement->id_paiement }}</td>
                            <td>{{ $paiement->eleve->nom_eleve ?? 'Inconnu' }}</td>
                            <td>{{ $paiement->tranche1 }}</td>
                            <td>{{ $paiement->tranche2 }}</td>
                            <td>{{ $paiement->tranche3 }}</td>
                            <td><span class="badge bg-success fs-6">{{ $paiement->tranche1 + $paiement->tranche2 + $paiement->tranche3 }}</span></td>
                            <td>
                                <a href="{{ route('paiements.edit', $paiement->id_paiement) }}" class="btn btn-sm btn-warning icon-btn me-1" title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('paiements.destroy', $paiement->id_paiement) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger icon-btn" title="Supprimer" onclick="return confirm('Supprimer ce paiement ?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($paiements->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Aucun paiement enregistré.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
