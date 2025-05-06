@extends('app')

@section('title', 'Ajouter un Personnel Administratif')

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
    <h2>Ajouter un Personnel Administratif</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('administrations.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nom_personnel" class="form-label">Nom du personnel</label>
            <input type="text" class="form-control" id="nom_personnel" name="nom_personnel" value="{{ old('nom_personnel') }}" required>
        </div>

        <div class="mb-4">
            <label for="profession" class="form-label">Profession</label>
            <select name="profession" id="profession" class="form-select" required>
                <option value="">-- Sélectionnez une profession --</option>
                <option value="Directeur" {{ old('profession') == 'Directeur' ? 'selected' : '' }}>Directeur</option>
                <option value="Secrétaire" {{ old('profession') == 'Secrétaire' ? 'selected' : '' }}>Secrétaire</option>
                <option value="Jardinier" {{ old('profession') == 'Jardinier' ? 'selected' : '' }}>Jardinier</option>
                <option value="Nettoyeur" {{ old('profession') == 'Nettoyeur' ? 'selected' : '' }}>Nettoyeur</option>
                <option value="Surveillant" {{ old('profession') == 'Surveillant' ? 'selected' : '' }}>Surveillant</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>
@endsection