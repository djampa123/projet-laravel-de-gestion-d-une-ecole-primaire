@extends('app')

@section('content')
<style>
    .card-animate {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        animation: slideFade 0.6s ease-out;
    }

    @keyframes slideFade {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-label {
        font-weight: bold;
        color: #2c3e50;
    }

    .btn-success {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        border: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px #0072ff60;
    }

    .btn-secondary {
        background: #dcdcdc;
        font-weight: bold;
    }

    .alert-danger {
        animation: shake 0.4s ease;
    }

    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
        100% { transform: translateX(0); }
    }
</style>

<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">✏️ Modifier un paiement</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paiements.update', $paiement->id_paiement) }}" method="POST" class="card-animate">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_eleve" class="form-label">👨‍🎓 Élève :</label>
            <select name="id_eleve" class="form-select" required>
                <option value="">-- Choisir un élève --</option>
                @foreach ($eleves as $eleve)
                    <option value="{{ $eleve->id_eleve }}" {{ $paiement->id_eleve == $eleve->id_eleve ? 'selected' : '' }}>
                        {{ $eleve->nom_eleve }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="tranche1" class="form-label">💰 Tranche 1 :</label>
                <input type="number" step="0.01" name="tranche1" value="{{ old('tranche1', $paiement->tranche1) }}" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="tranche2" class="form-label">💰 Tranche 2 :</label>
                <input type="number" step="0.01" name="tranche2" value="{{ old('tranche2', $paiement->tranche2) }}" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="tranche3" class="form-label">💰 Tranche 3 :</label>
                <input type="number" step="0.01" name="tranche3" value="{{ old('tranche3', $paiement->tranche3) }}" class="form-control" required>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-success px-4">✅ Mettre à jour</button>
            <a href="{{ route('paiements.index') }}" class="btn btn-secondary px-4">🔙 Annuler</a>
        </div>
    </form>
</div>
@endsection
