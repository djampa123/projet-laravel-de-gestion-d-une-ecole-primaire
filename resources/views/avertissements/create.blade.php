@extends('layout')

@section('content')
<style>
    .form-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 30px;
        background: #fdfdfd;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
        color: #2c3e50;
    }

    label {
        font-weight: 600;
        margin-top: 15px;
        display: block;
        color: #2c3e50;
    }

    select, textarea, input[type="date"] {
        width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        margin-top: 5px;
        margin-bottom: 20px;
        transition: all 0.3s;
    }

    select:focus, textarea:focus, input[type="date"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        outline: none;
    }

    .btn-submit {
        background: linear-gradient(135deg, #00c9ff, #92fe9d);
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        width: 100%;
        transition: background 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #92fe9d, #00c9ff);
    }
</style>

<div class="form-container">
    <h2>➕ Ajouter un Avertissement</h2>

    <form method="POST" action="{{ route('avertissements.store') }}">
        @csrf

        <label for="id_eleve">👤 Élève</label>
        <select name="id_eleve" id="id_eleve" required>
            <option value="">-- Sélectionner --</option>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id_eleve }}">{{ $eleve->nom_eleve }} {{ $eleve->prenom_eleve }}</option>
            @endforeach
        </select>

        <label for="description">📝 Description</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="date_avertissement">📅 Date</label>
        <input type="date" name="date_avertissement" id="date_avertissement" required>

        <button type="submit" class="btn-submit">Enregistrer</button>
    </form>
</div>
@endsection
