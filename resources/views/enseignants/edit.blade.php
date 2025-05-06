@extends('app')

@section('title', 'Modifier Enseignant')

@section('content')
<style>
    /* Styles personnalisés pour un design splendide */
    .container {
        max-width: 700px;
        margin-top: 50px;
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        color: #2c3e50;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    h2::after {
        content: '';
        width: 60px;
        height: 4px;
        background: #3498db;
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .form-label {
        font-weight: 600;
        color: #34495e;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
    }

    .btn-primary {
        background: linear-gradient(45deg, #3498db, #2980b9);
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 600;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 20px;
    }

    /* Animation d'apparition */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 576px) {
        .container {
            padding: 20px;
        }
        h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container">
    <h2>Modifier Enseignant</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enseignants.update', $enseignant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nom_enseignant" class="form-label">Nom de l'enseignant</label>
            <input type="text" name="nom_enseignant" id="nom_enseignant" class="form-control" value="{{ old('nom_enseignant', $enseignant->nom_enseignant) }}" required>
        </div>

        <div class="mb-4">
            <label for="classe_id" class="form-label">Classe enseignée</label>
            <select name="classe_id" id="classe_id" class="form-select" required>
                <option value="">-- Sélectionnez une classe --</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ old('classe_id', $enseignant->classe_id) == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nom_classe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>
@endsection