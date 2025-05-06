@extends('app')

@section('content')
<style>
        body {
            background: url('{{ asset('images/b1.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            animation: gradientBG 12s ease infinite;
        }

        .overlay-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            border-radius: 1rem;
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
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0 text-center">
                            {{ isset($paiement) ? '✏️ Modifier un paiement' : '💰 Ajouter un paiement' }}
                        </h4>
                    </div>
                    <div class="card-body bg-light">

                        <form action="{{ isset($paiement) ? route('paiements.update', $paiement->id_paiement) : route('paiements.store') }}" method="POST">
                            @csrf
                            @if(isset($paiement)) @method('PUT') @endif

                            <div class="mb-3">
                                <label class="form-label fw-bold">Élève</label>
                                <select name="id_eleve" class="form-select" required>
                                    <option value="">-- Choisir un élève --</option>
                                    @foreach ($eleves as $eleve)
                                        <option value="{{ $eleve->id_eleve }}"
                                            {{ isset($paiement) && $paiement->id_eleve == $eleve->id_eleve ? 'selected' : '' }}>
                                            {{ $eleve->nom_eleve}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Tranche 1</label>
                                    <input type="number" name="tranche1" class="form-control"
                                           value="{{ old('tranche1', $paiement->tranche1 ?? '') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Tranche 2</label>
                                    <input type="number" name="tranche2" class="form-control"
                                           value="{{ old('tranche2', $paiement->tranche2 ?? '') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Tranche 3</label>
                                    <input type="number" name="tranche3" class="form-control"
                                           value="{{ old('tranche3', $paiement->tranche3 ?? '') }}" required>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-success btn-lg shadow">
                                    {{ isset($paiement) ? '💾 Mettre à jour' : '✅ Enregistrer' }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
