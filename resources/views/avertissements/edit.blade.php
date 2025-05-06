@extends('layout')

@section('content')
<style>
    .form-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.08);
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
        color: #2c3e50;
    }

    label {
        font-weight: 600;
        margin-top: 15px;
        display: block;
        color: #34495e;
    }

    select, textarea, input[type="date"] {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-top: 5px;
        margin-bottom: 15px;
        transition: border-color 0.3s;
    }

    select:focus, textarea:focus, input[type="date"]:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-submit {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        color: white;
        border: none;
        padding: 12px 25px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
        display: block;
        width: 100%;
    }

    .btn-submit:hover {
        background: linear-gradient(to right, #0072ff, #00c6ff);
    }

    .alert-danger {
        background: #ffe6e6;
        border-left: 5px solid #ff4d4d;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        animation: fadeIn 0.4s ease-in;
    }
</style>

<div class="form-container">
    <h2>✏️ Modifier un Avertissement</h2>

    @if ($errors->any())
        <div class="alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('avertissements.update', $avertissement->id_avertissement) }}">
        @csrf
        @method('PUT')

        <label for="id_eleve">👤 Élève</label>
        <select name="id_eleve" id="id_eleve" required>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id_eleve }}"
                    {{ $avertissement->id_eleve == $eleve->id_eleve ? 'selected' : '' }}>
                    {{ $eleve->nom_eleve }} {{ $eleve->prenom_eleve }}
                </option>
            @endforeach
        </select>

        <label for="description">📝 Description</label>
        <textarea name="description" id="description" rows="4" required>{{ $avertissement->description }}</textarea>

        <label for="date_avertissement">📅 Date</label>
        <input type="date" name="date_avertissement" id="date_avertissement" value="{{ $avertissement->date_avertissement }}" required>

        <button type="submit" class="btn-submit">✅ Mettre à jour</button>
    </form>
</div>
@endsection
