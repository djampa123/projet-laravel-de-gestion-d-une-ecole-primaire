@extends('app')

@section('title', 'Ajouter un Enseignant')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-title {
        font-size: 24px;
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 20px;
        text-align: center;
    }

    .card-custom {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .form-label {
        font-weight: 600;
    }
</style>

<div class="container fade-in mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-custom">
                <h2 class="form-title">➕ Ajouter un Enseignant</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>❌ {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enseignants.store') }}" method="POST">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom_enseignant" class="form-label">👨‍🏫 Nom de l'enseignant</label>
                        <input type="text" name="nom_enseignant" class="form-control" value="{{ old('nom_enseignant') }}" required placeholder="Ex : Monsieur TCHATCHOUA">
                    </div>

                    <!-- Classe -->
                    <div class="mb-4">
                        <label for="classe_id" class="form-label">📘 Classe enseignée</label>
                        <select name="classe_id" id="classe_id" class="form-select" required>
                            <option value="">-- Sélectionnez une classe --</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id_classe }}" {{ old('classe_id') == $classe->id_classe ? 'selected' : '' }}>
                                    {{ $classe->nom_classe }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bouton -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success px-4">✅ Enregistrer</button>
                        <a href="{{ route('enseignants.index') }}" class="btn btn-secondary ms-2">↩️ Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
