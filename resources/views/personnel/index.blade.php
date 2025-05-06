@extends('app')

@section('title', 'Gestion du Personnel')

@section('content')
<style>
    .personnel-container {
        margin-top: 80px;
        text-align: center;
        animation: fadeIn 0.8s ease-in-out;
    }

    .personnel-container h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 40px;
        color: #2c3e50;
    }

    .btn-lg-custom {
        padding: 18px 30px;
        font-size: 1.25rem;
        font-weight: bold;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-lg-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container personnel-container">
    <h2>👥 Gestion du Personnel</h2>
    <div class="d-grid gap-4 col-md-6 mx-auto">
        <a href="{{ route('enseignants.index') }}" class="btn btn-primary btn-lg btn-lg-custom">
            📘 Personnel Enseignant
        </a>
        <a href="{{ route('administrations.index') }}" class="btn btn-dark btn-lg btn-lg-custom">
            🗂️ Personnel Administratif
        </a>
        <a href="{{ route('entretien.index') }}" class="btn btn-success btn-lg btn-lg-custom">
            🧹 Personnel d’Entretien
        </a>
    </div>
</div>
@endsection
