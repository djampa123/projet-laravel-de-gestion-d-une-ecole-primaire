@extends('app')

@section('title', 'Ajouter un agent')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-success">➕ Ajouter un agent d'entretien</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('entretien.store') }}" method="POST" class="border p-4 rounded shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label for="nom_personnel" class="form-label">👤 Nom complet</label>
            <input type="text" id="nom_personnel" name="nom_personnel" class="form-control" value="{{ old('nom_personnel') }}" required>
        </div>

        <div class="mb-3">
            <label for="profession" class="form-label">🛠️ Profession</label>
            <select id="profession" name="profession" class="form-select" required>
                <option value="">-- Sélectionner une profession --</option>
                <option value="Nettoyeur" {{ old('profession') == 'Nettoyeur' ? 'selected' : '' }}>Nettoyeur</option>
                <option value="Jardinier" {{ old('profession') == 'Jardinier' ? 'selected' : '' }}>Jardinier</option>
                <option value="Agent de sécurité" {{ old('profession') == 'Agent de sécurité' ? 'selected' : '' }}>Agent de sécurité</option>
                <!-- Ajoute d'autres rôles si besoin -->
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Enregistrer</button>
    </form>
</div>
@endsection
