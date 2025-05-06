@extends('layout')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h3 class="mb-0">📋 Détails de l'Élève</h3>
        </div>

        <div class="card-body bg-light">
            <div class="row g-4 align-items-center">
                <!-- Colonne texte -->
                <div class="col-md-8">
                    <ul class="list-group list-group-flush fs-5">
                        <li class="list-group-item"><strong>👤 Nom :</strong> {{ $student->nom }}</li>
                        <li class="list-group-item"><strong>👤 Prénom :</strong> {{ $student->prenom }}</li>
                        <li class="list-group-item"><strong>🎂 Date de naissance :</strong> {{ $student->date_naissance }}</li>
                        <li class="list-group-item"><strong>📍 Lieu de naissance :</strong> {{ $student->lieu_naissance }}</li>
                        <li class="list-group-item"><strong>📘 Section :</strong> {{ $student->section }}</li>
                        <li class="list-group-item"><strong>👪 Nom du parent :</strong> {{ $student->nom_parent }}</li>
                        <li class="list-group-item"><strong>📞 Téléphone parent :</strong> {{ $student->tel_parent }}</li>
                    </ul>
                </div>

                <!-- Colonne photo -->
                <div class="col-md-4 text-center">
                    @if($student->image && file_exists(storage_path('app/public/images/' . $student->image)))
                        <img src="{{ asset('storage/images/' . $student->image) }}"
                             class="img-fluid rounded-circle border shadow-sm"
                             alt="Photo de {{ $student->nom }}" width="200" height="200">
                    @else
                        <div class="text-muted">Aucune image disponible</div>
                    @endif
                </div>
            </div>

            <!-- Bouton retour -->
            <div class="text-end mt-4">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    ⬅️ Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
