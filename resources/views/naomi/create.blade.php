@extends('layout')

@section('content')
<style>
        body {
            background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            border-radius: 1rem;
            animation: gradientBG 12s ease infinite;
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
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h3 class="mb-0 text-center">➕ Ajouter un élève</h3>
                </div>

                <div class="card-body bg-light">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <!-- Nom -->
                            <div class="col-md-6">
                                <label for="nom" class="form-label">👤 Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>

                            <!-- Prénom -->
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">👤 Prénom</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>

                            <!-- Date de naissance -->
                            <div class="col-md-6">
                                <label for="date_naissance" class="form-label">🎂 Date de naissance</label>
                                <input type="date" name="date_naissance" class="form-control" required>
                            </div>

                            <!-- Lieu de naissance -->
                            <div class="col-md-6">
                                <label for="lieu_naissance" class="form-label">📍 Lieu de naissance</label>
                                <input type="text" name="lieu_naissance" class="form-control" required>
                            </div>

                            <!-- Photo -->
                            <div class="col-md-6">
                                <label for="image" class="form-label">📸 Photo de l'élève</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <!-- Section -->
                            <div class="col-md-6">
                                <label for="section" class="form-label">📘 Section</label>
                                <select name="section" class="form-select" required>
                                    <option value="">-- Sélectionnez une section --</option>
                                    <option value="francophone">Francophone</option>
                                    <option value="anglophone">Anglophone</option>
                                </select>
                            </div>

                            <!-- Classe -->
                            <div class="col-md-6">
                                <label for="id_classe" class="form-label">🏫 Classe</label>
                                <select name="id_classe" class="form-select" required>
                                    <option value="">-- Sélectionnez une classe --</option>
                                    <option value="1">SIL</option>
                                    <option value="2">CP</option>
                                    <option value="3">CE1</option>
                                    <option value="4">CE2</option>
                                    <option value="5">CM1</option>
                                    <option value="6">CM2</option>
                                </select>
                            </div>

                            <!-- Salle -->
                            <div class="col-md-6">
                                <label for="id_salle" class="form-label">🏠 Salle</label>
                                <select name="id_salle" class="form-select" required>
                                    <option value="">-- Sélectionnez une salle --</option>
                                    <option value="1">Salle A</option>
                                    <option value="2">Salle B</option>
                                </select>
                            </div>

                            <!-- Nom du parent -->
                            <div class="col-md-6">
                                <label for="nom_parent" class="form-label">👪 Nom du parent</label>
                                <input type="text" name="nom_parent" class="form-control" required>
                            </div>

                            <!-- Téléphone du parent -->
                            <div class="col-md-6">
                                <label for="tel_parent" class="form-label">📞 Téléphone du parent</label>
                                <input type="text" name="tel_parent" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                ✅ AJOUTER
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
