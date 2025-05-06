@extends('app')

@section('title', 'Modifier un Personnel')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-control:focus {
        border-color: #5cb85c;
        box-shadow: 0 0 0 0.2rem rgba(92, 184, 92, 0.25);
    }

    .btn-custom {
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-custom:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>

<div class="container fade-in mt-5">
    <div class="card shadow-sm border-0 p-4">
        <h2 class="mb-4 text-center text-primary">✏️ Modifier un Personnel</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>🔺 {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('administrations.update', $administration->id_administration) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom_personnel" class="form-label">👤 Nom du personnel</label>
                <input type="text" class="form-control" id="nom_personnel" name="nom_personnel"
                    value="{{ old('nom_personnel', $administration->nom_personnel) }}" required>
            </div>

            <div class="mb-4">
                <label for="profession" class="form-label">💼 Profession</label>
                <select name="profession" id="profession" class="form-select" required>
                    <option value="">-- Sélectionnez une profession --</option>
                    @foreach (['Directeur', 'Secrétaire', 'Jardinier', 'Nettoyeur', 'Surveillant'] as $profession)
                        <option value="{{ $profession }}"
                            {{ old('profession', $administration->profession) === $profession ? 'selected' : '' }}>
                            {{ $profession }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('administrations.index') }}" class="btn btn-secondary btn-custom">← Retour</a>
                <button type="submit" class="btn btn-success btn-custom">✅ Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
